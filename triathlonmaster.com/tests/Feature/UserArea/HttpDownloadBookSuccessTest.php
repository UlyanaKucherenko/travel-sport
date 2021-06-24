<?php

namespace Tests\Feature\UserArea;

use App\Models\Book;
use Carbon\Carbon;
use Tests\AuthEnv;
use Tests\TestCase;

class HttpDownloadBookSuccessTest extends TestCase
{
    use AuthEnv;

    public function testBooksRouteByNonSubscribe()
    {
        $this->createUser();
        $this->actingAs($this->user)
            ->get('/member_area/books')
            ->assertStatus(302);
    }

    public function testBooksRouteByNonActiveNow()
    {
        $this->createUser([
            'subscribe_status' => true,
            'subscribe_date' => Carbon::today()->subMonth(2),
        ]);
        $this->actingAs($this->user)
            ->get('/member_area/books')
            ->assertStatus(302);
    }

    public function testBooksRouteByActiveNow()
    {
        $this->createUser([
            'subscribe_status' => true,
            'subscribe_date' => Carbon::today(),
        ]);
        $this->actingAs($this->user)
            ->get('/member_area/books')
            ->assertStatus(200);
    }

    public function testDownloadBookRoute()
    {
        $plan_id = 2;
        $this->createUser([
            'plan_id' => $plan_id,
            'subscribe_status' => true,
            'subscribe_date' => Carbon::today(),
        ]);

        $book = Book::where("plan_id", "=", $plan_id)->first();
        if($book) {
            $this->actingAs($this->user)
                ->get("/member_area/books/{$book->id}")
                ->assertStatus(200);
        }
    }

    public function testDownloadBookNonSubscribe()
    {
        $plan_id = 2;
        $this->createUser([
            'plan_id' => $plan_id,
            'subscribe_status' => false,
            'subscribe_date' => null,
        ]);
        $book = Book::where("plan_id", "=", $plan_id)->first();
        if($book){
            $this->actingAs($this->user)
                ->get("/member_area/books/{$book->id}")
                ->assertStatus(302);
        }

    }

    public function testDownloadBookNonActive()
    {
        $plan_id = 2;
        $this->createUser([
            'plan_id' => $plan_id,
            'subscribe_status' => true,
            'subscribe_date' => Carbon::today()->subMonth(2),
        ]);
        $book = Book::where("plan_id", "=", $plan_id)->first();
        if($book) {
            $this->actingAs($this->user)
                ->get("/member_area/books/{$book->id}")
                ->assertStatus(302);
        }
    }
}
