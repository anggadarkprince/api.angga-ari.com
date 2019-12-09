<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'date_of_birth', 'nationality', 'address'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'user_id'];

    /**
     * Get the portfolios for the user profile.
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Get the achievements for the user profile.
     */
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    /**
     * Get the experiences for the user profile.
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Get the educations for the user profile.
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * Get the educations for the user profile.
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the educations for the user profile.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get all of the emails for the profile.
     */
    public function emails()
    {
        return $this->hasMany(Contact::class)
            ->select(['profile_id', DB::raw('IFNULL(prefix, "Email") AS type'), 'value AS url', 'is_primary'])
            ->where('type', 'email');
    }

    /**
     * Get all of the phones for the profile.
     */
    public function phones()
    {
        return $this->hasMany(Contact::class)
            ->select(['profile_id', 'prefix', 'value AS number', 'is_primary'])
            ->where('type', 'phone');
    }

    /**
     * Get all of the socials for the profile.
     */
    public function socials()
    {
        return $this->hasMany(Contact::class)
            ->select(['profile_id', 'prefix AS social', 'value AS url', 'is_primary'])
            ->where('type', 'social');
    }

    /**
     * Get all of the websites for the profile.
     */
    public function websites()
    {
        return $this->hasMany(Contact::class)
            ->select(['profile_id', DB::raw('IFNULL(prefix, "Website") AS type'), 'value AS url', 'is_primary'])
            ->where('type', 'website');
    }

    /**
     * Get all of the other for the profile.
     */
    public function others()
    {
        return $this->hasMany(Contact::class)
            ->select(['profile_id', 'prefix AS type', 'value', 'is_primary'])
            ->where('type', 'other');
    }

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
