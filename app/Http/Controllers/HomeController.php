<?php

namespace App\Http\Controllers;

use App\Category;
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
        } else {
            $category = Category::where('name', '=', $type)->first();
            if (!$category) {
                return redirect()->route('home');
            }
            $media = $this->getMediaByCategory($category->id);
        }

        return view('user.single_page');
    }

    private function getMediaByCategory($category_id)
    {
        $media = Media::where('category_id', $category_id)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return $media;
    }

    private function viewPlusPlus($category)
    {

    }
}
