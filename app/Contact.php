<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'prefix', 'value', 'is_primary'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['profile_id', 'laravel_through_key'];

    /**
     * Get the profile that owns the contact.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
