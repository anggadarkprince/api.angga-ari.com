<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'rank', 'description', 'event', 'achieved_at', 'awarded_by'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['laravel_through_key', 'profile_id', 'id'];

    /**
     * Get the profile that owns the achievement.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
