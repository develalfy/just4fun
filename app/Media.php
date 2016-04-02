<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'thumb', 'site_name', 'author_name', 'publish_date_time', 'meta_tags', 'views', 'category_id', 'user_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
