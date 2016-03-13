<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_top', 'image_top', 'code_aside', 'image_aside', 'category_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
