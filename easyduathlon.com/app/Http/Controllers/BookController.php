<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * BookController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
        $this->routes = collect([
            "updateProfile" => route("updateProfile"),
            "dashboard" => route("dashboard"),
            "indexBook" => route("indexBook"),
            "coach" => route("coach"),
            "manage" => route("manage"),
            "profile" => route("showMember"),
            "set_confirm" => route("setConfirm"),
            "home" => route("home"),
            "logout" => route("logout"),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\View\View
     */
    public function index(Request $request, Book $book): View
    {

        return view('books/books', [
            "books" => $book->getBooks($request),
            "routes" => $this->routes,
            "locale" => App::getLocale(),
            "totalBooks" => auth()->user()->plan->count_books,  //$book->getBooksPlanCount(),//$book->all()->count(),
            "availableBooks" => auth()->user()->books->count(),//$book->getBooksPlanCount(),
            "recentBooks" => json_encode($book->recentBooks()),
            "plan" => json_encode(Auth::user()->plan->only(['slug'])),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $books = Book::getBooksFromDir();

        if ($books) {
            foreach ($books as $book) {
                $model = new Book();

                if (Book::where('title', '=', $book['title'])->exists()) continue;

                $model->title = $book['title'];
                $model->img = $book['img'];
                $model->src = $book['src'];

                $model->save();
            }
//            Session::flash('success', 'Books were updated.');
        } else {
//            Session::flash('success', 'Books not exists');
        }

        return redirect()->route('books.index');
    }

    /**
     * Update books sort
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sort(Request $request)
    {
        foreach ($request->all() as $id => $sort) {
            $book = Book::find($id);
            if ($book) {
                $book->sort = $sort;
                $book->save();
            }
        }

        return back();
    }

    /**
     * Set random sort to books
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function randomSort()
    {
        foreach (Book::all() as $book) {
            $book->sort = random_int(0, 100);
            $book->save();
        }

        return back();
    }

    /**
     * @param $id
     * @param \App\Models\Book $book
     * @return mixed
     */
    public function show($id, Book $book)
    {
        $user = auth()->user();
        if ($user->canDownload($id)) {
            $user->attachBook($id);
            $bookFind = $book->findAllowedBook($id);

            return Storage::download($bookFind['src']);
        }
        return redirect()->back()->with(['errors' => 'download limit reached']);
    }
}
