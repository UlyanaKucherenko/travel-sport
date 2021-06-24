<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait AuthEnv{

    protected $user;

    protected function createUser($options = []){
        if(count($options)){
            $this->user = factory(User::class)->create($options);
        }else{
            $this->user = factory(User::class)->create();
        }
    }

    public function setUp(){
        parent::setUp();
        DB::beginTransaction();
    }

    public function tearDown(){
        DB::rollBack();
        parent::tearDown();
    }
}