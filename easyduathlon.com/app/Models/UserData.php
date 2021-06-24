<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserData extends Model
{
    protected $table = 'user_data';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}
