<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expertise', 'description', 'level', 'is_group'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['skill_id', 'laravel_through_key'];

    /**
     * Get the profile that owns the skill.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the educations for the user profile.
     */
    public function expertise()
    {
        return $this->hasMany(Skill::class)
            ->select(['skill_id', 'expertise', 'description', 'level']);
    }

}
