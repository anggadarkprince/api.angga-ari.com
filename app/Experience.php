<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'company', 'location', 'start_date', 'until_date', 'description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['laravel_through_key', 'profile_id', 'id'];

    /**
     * Get the profile that owns the experience.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
