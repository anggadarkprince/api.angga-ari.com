<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'src', 'mime', 'title', 'description', 'is_primary'
    ];

    /**
     * Get the owning attachable model.
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
