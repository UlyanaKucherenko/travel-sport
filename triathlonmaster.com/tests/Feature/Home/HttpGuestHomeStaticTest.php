<?php

namespace Tests\Feature\Home;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpGuestHomeStaticTest extends TestCase
{

    public function testPrivacyPolicyRoute()
    {
        $this->get('/privacy_policy')
            ->assertStatus(200);
    }

    public function testTermsConditionsRoute()
    {
        $this->get('/terms_conditions')
            ->assertStatus(200);
    }

    public function testRefundPolicyRoute()
    {
        $this->get('/refund_policy')
            ->assertStatus(200);
    }

    public function testEmptyLocaleRoute()
    {
        $response = $this->get('/locale');

        $response
            ->assertStatus(200)
            ->assertJson([
                'session' => 'en',
                'locale' => 'en',
            ]);
    }

    public function testENLocaleRoute()
    {
        $response = $this->get('/locale/en');

        $response
            ->assertStatus(200)
            ->assertJson([
                'session' => 'en',
                'locale' => 'en',
            ]);
    }

    public function testITLocaleRoute()
    {
        $response = $this->get('/locale/it');

        $response
            ->assertStatus(200)
            ->assertJson([
                'session' => 'it',
                'locale' => 'it',
            ]);
    }

    public function testFRLocaleRoute()
    {
        $response = $this->get('/locale/fr');

        $response
            ->assertStatus(200)
            ->assertJson([
                'session' => 'fr',
                'locale' => 'fr',
            ]);
    }

    public function testWrongLocaleRoute()
    {
        $response = $this->get('/locale/ru');

        $response
            ->assertStatus(200)
            ->assertJson([
                'session' => NULL,
                'locale' => 'en',
            ]);
    }
}
