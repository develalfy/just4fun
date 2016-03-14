<?php
/**
 * Created by PhpStorm.
 * User: vampire
 * Date: 3/13/16
 * Time: 9:30 PM
 */

namespace App\Core\Entity;


use App\Category;

class Getters
{
    // Categories area
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }
}