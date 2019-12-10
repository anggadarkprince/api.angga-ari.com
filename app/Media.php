<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'src', 'mime', 'title', 'description', 'is_primary'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['attachable_type', 'attachable_id', 'created_at', 'updated_at'];

    /**
     * Get the owning attachable model.
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
