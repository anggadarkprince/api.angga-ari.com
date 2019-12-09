<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'education', 'institution', 'field', 'location', 'start_date', 'until_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['laravel_through_key', 'profile_id', 'id'];

    /**
     * Get the profile that owns the education.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
