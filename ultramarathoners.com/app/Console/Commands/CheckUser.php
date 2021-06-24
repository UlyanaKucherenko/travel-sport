<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Console\Command;

class CheckUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkUser:books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check users and add books to user if it need';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = (new User())->getUsersToUpdate();

        foreach ($users as $user){
            $count_books = $user->plan->count_books;
            $existsBooks = $user->books->pluck('id');
            $books = Book::whereNotIn('id', $existsBooks)->take($count_books)->pluck('id');

//            $user->touch();
            $user->books()->attach($books);

            $this->info('Added '.count($books).' books to user '.$user->id.'(id)');
        }

        $this->info('Users Books updated');
    }
}
