<?php
/**
 * Created by PhpStorm.
 * User: vampire
 * Date: 3/13/16
 * Time: 9:30 PM
 */

namespace App\Core\Entity;


use App\Ads;
use App\Category;
use App\Media;

class Getters
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    static function getDataByCategory($category_id)
    {
        $media = self::getMediaByCategory($category_id);
        $ads = self::getAds($category_id);

        return array($media, $ads);
    }

    static function getAds($id)
    {
        $ads = Ads::where('category_id', $id)
            ->first();
        return $ads;
    }

    static function getMediaByCategory($id)
    {
        $media = Media::where('category_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return $media;
    }

    static function getCategoryName($type)
    {
        $listCategories = array(
            'top' => 'المفضلة',
            'egyptian' => 'مصري',
            'gulf' => 'خليجي',
            'foreigners' => 'اجنبي',
            'sports' => 'رياضة',
            'kids' => 'اطفال',
            'animals' => 'حيوانات'
        );

        return $listCategories[$type];
    }
}