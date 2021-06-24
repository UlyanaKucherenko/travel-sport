<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpGuestSuccessTest extends TestCase
{
    public function testBaseRoute(){
        $this->get('/')
            ->assertStatus(200);
    }

    public function testHomeRoute(){
        $this->get('/home')
            ->assertStatus(200);
    }

    public function testMemberEmptyRoute(){
        $this->get('/member')
            ->assertStatus(200);
    }

    public function testMemberBeginnerRoute(){
        $this->get('/member/Beginner')
            ->assertStatus(200);
    }

    public function testMemberBasicRoute(){
        $this->get('/member/Basic')
            ->assertStatus(200);
    }

    public function testMemberPRORoute(){
        $this->get('/member/PRO')
            ->assertStatus(200);
    }

    public function testPrivacyPolicyRoute(){
        $this->get('/privacy_policy')
            ->assertStatus(200);
    }

    public function testTermsConditionsRoute(){
        $this->get('/terms_conditions')
            ->assertStatus(200);
    }

    public function tesRefundPolicyRoute(){
        $this->get('/refund_policy')
            ->assertStatus(200);
    }
}
