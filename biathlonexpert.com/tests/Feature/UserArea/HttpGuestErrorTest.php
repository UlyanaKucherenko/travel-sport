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
        $this->get('/member_area/')
            ->assertStatus(302);
    }

    public function testProfileRoute()
    {
        $this->get('/member_area/profile')
            ->assertStatus(302);
    }

    public function testDashboardRoute()
    {
        $this->get('/member_area/dashboard')
            ->assertStatus(302);
    }

    public function testManageRoute()
    {
        $this->get('/member_area/manage')
            ->assertStatus(302);
    }

    public function testCoachRoute()
    {
        $this->get('/member_area/coach')
            ->assertStatus(302);
    }

    public function testBooksRoute()
    {
        $this->get('/member_area/books')
            ->assertStatus(302);
    }
}
