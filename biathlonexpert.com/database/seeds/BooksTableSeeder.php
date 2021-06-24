<?php

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        try {
            $booksCategories = Storage::disk('local')->directories('books');

            foreach ($booksCategories as $booksCategory) {
                $books = Storage::disk('local')->directories($booksCategory);

                list($bookname, $categoryId) = explode("/", $booksCategory);

                foreach ($books as $book) {

                    $files = Storage::disk('local')->allFiles($book);

                    $pdf = collect($files)->first(function ($value, $key) {
                        return preg_match("/.\.pdf/", $value) === 1;
                    });
                    //Todo add default img!!!
                    $jpg = collect($files)->first(function ($value, $key) {
                        return preg_match("/.\.(jpg|png|bmp|jpeg|gif)/i", $value) === 1;
                    });

                    if (! $pdf || ! $jpg) {
                        printf("PDF or Image Not Found %s\n", json_encode($files));
                        continue;
                    }

                    factory(Book::class)->create([
                        'img' => $jpg,
                        'src' => $pdf,
                        'title' => str_replace("books/$categoryId/", '', $book),
                        'plan_id' => $categoryId,
                        'category_id' => $categoryId,
                        'sort' => 0,
                    ]);
                }
            }
        } catch (\Exception $error) {
            dump($error);
        }
    }
}
