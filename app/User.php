<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at', 'remember_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
    ];

    protected $with = ['profile'];

    /**
     * Get the profile associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get all of the posts for the country.
     */
    public function contacts()
    {
        return $this->hasManyThrough(Contact::class, Profile::class);
    }

    /**
     * Get all of the emails for the profile.
     */
    public function emails()
    {
        return $this->hasManyThrough(Contact::class, Profile::class)
            ->select([DB::raw('IFNULL(prefix, "Email") AS type'), 'value AS url', 'is_primary'])
            ->where('type', 'email');
    }

    /**
     * Get all of the phones for the profile.
     */
    public function phones()
    {
        return $this->hasManyThrough(Contact::class, Profile::class)
            ->select(['prefix', 'value AS number', 'is_primary'])
            ->where('type', 'phone');
    }

    /**
     * Get all of the socials for the profile.
     */
    public function socials()
    {
        return $this->hasManyThrough(Contact::class, Profile::class)
            ->select(['prefix AS social', 'value AS url', 'is_primary'])
            ->where('type', 'social');
    }

    /**
     * Get all of the websites for the profile.
     */
    public function websites()
    {
        return $this->hasManyThrough(Contact::class, Profile::class)
            ->select([DB::raw('IFNULL(prefix, "Website") AS type'), 'value AS url', 'is_primary'])
            ->where('type', 'website');
    }

    /**
     * Get all of the other for the profile.
     */
    public function others()
    {
        return $this->hasManyThrough(Contact::class, Profile::class)
            ->select(['prefix AS type', 'value', 'is_primary'])
            ->where('type', 'other');
    }

    /**
     * Get all of the educations for the profile.
     */
    public function educations()
    {
        return $this->hasManyThrough(Education::class, Profile::class);
    }

    /**
     * Get all of the experiences for the profile.
     */
    public function experiences()
    {
        return $this->hasManyThrough(Experience::class, Profile::class);
    }

    /**
     * Get all of the experiences for the profile.
     */
    public function achievements()
    {
        return $this->hasManyThrough(Achievement::class, Profile::class);
    }

    /**
     * Get all of the skills for the profile.
     */
    public function skills()
    {
        return $this->hasManyThrough(Skill::class, Profile::class)
            ->select(['skills.id', 'expertise AS group', 'description'])
            ->where('skill_id', null);
    }

    /**
     * Get all of the skills for the profile.
     */
    public function portfolios()
    {
        return $this->hasManyThrough(Portfolio::class, Profile::class);
    }
}
