<?php

namespace Tests\Feature\UserArea;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpGuestErrorTest extends TestCase
{

    public function testBaseRoute()
    {
        $this->get('/member-area/')
            ->assertStatus(302);
    }

    public function testProfileRoute()
    {
        $this->get('/member-area/profile')
            ->assertStatus(302);
    }

    public function testDashboardRoute()
    {
        $this->get('/member-area/dashboard')
            ->assertStatus(302);
    }

    public function testManageRoute()
    {
        $this->get('/member-area/manage')
            ->assertStatus(302);
    }

    public function testCoachRoute()
    {
        $this->get('/member-area/coach')
            ->assertStatus(302);
    }

    public function testBooksRoute()
    {
        $this->get('/member-area/books')
            ->assertStatus(302);
    }
}
