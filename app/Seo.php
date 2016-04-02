<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    public $table = "seo";

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meta_description', 'keywords', 'title',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
