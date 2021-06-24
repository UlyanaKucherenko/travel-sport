<?php

namespace Tests\Feature;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpAdminSuccessTest extends TestCase
{
    use AuthEnv;

    public function testBaseRoute()
    {
        $this->createUser();
        $this
            ->actingAs($this->user)
            ->get('/')
            ->assertStatus(200);
    }

    public function testHomeRoute()
    {
        $this->createUser();
        $this
            ->actingAs($this->user)
            ->get('/home')
            ->assertStatus(200);
    }

    public function testMemberEmptyRoute()
    {
        $this->createUser();
        $this
//            ->actingAs($this->user)
            ->get('/member')
            ->assertStatus(200);
    }

    public function testMemberBeginnerRoute()
    {
        $this->createUser();
        $this
//            ->actingAs($this->user)
            ->get('/member/Beginner')
            ->assertStatus(200);
    }

    public function testMemberBasicRoute()
    {
        $this->createUser();
        $this
//            ->actingAs($this->user)
            ->get('/member/Basic')
            ->assertStatus(200);
    }

    public function testMemberPRORoute()
    {
        $this->createUser();
        $this
//            ->actingAs($this->user)
            ->get('/member/PRO')
            ->assertStatus(200);
    }

    public function testPrivacyPolicyRoute()
    {
        $this->createUser();
        $this->actingAs($this->user)
            ->get('/privacy_policy')
            ->assertStatus(200);
    }

    public function testTermsConditionsRoute()
    {
        $this->createUser();
        $this->actingAs($this->user)
            ->get('/terms_conditions')
            ->assertStatus(200);
    }

    public function tesRefundPolicyRoute()
    {
        $this->createUser();
        $this->actingAs($this->user)
            ->get('/refund_policy')
            ->assertStatus(200);
    }
}
