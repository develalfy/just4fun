<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use App\Core\Entity\Getters;
use App\Http\Requests;
use App\Media;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->singlePage('top');
    }

    public function singlePage($type)
    {
        $type = strtolower($type);

        if ($type == 'top') {
            $media = Media::orderBy('views', 'desc')
                ->paginate(20);
            $ads = Getters::getAds(null);
        } else {
            $category = Category::where('name', '=', $type)->first();
            if (!$category) {
                return redirect()->route('home');
            }
            list($media, $ads) = Getters::getDataByCategory($category->id);
        }

        $categoryName = Getters::getCategoryName($type);

        return view('user.single_page', compact('media', 'ads', 'categoryName'));
    }

    public function viewMedia($id)
    {
        $media = Media::where('id', $id)->first();
        $media->views += 1;
        $media->save();
        // Get related media
        $related = Media::where('category_id', '=', $media->category_id)
            ->where('id', '!=', $id)
            ->limit(5)
            ->get();

        $ads = Ads::where('category_id', $media->category_id)
            ->first();

        return view('user.view_media', compact('media', 'related', 'ads'));
    }
}