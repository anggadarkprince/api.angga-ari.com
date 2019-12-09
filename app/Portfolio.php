<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category', 'platform', 'organization', 'start_date', 'end_date'
    ];

    /**
     * Get all of the images's portfolio.
     */
    public function medias()
    {
        return $this->morphMany(Media::class, 'attachable');
    }

    /**
     * Get the profile that owns the portfolio.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
