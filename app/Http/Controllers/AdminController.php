<?php

namespace App\Http\Controllers;

use App\Category;
use App\Core\Entity\Getters;
use App\Media;
use App\Seo;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getListMedia()
    {
        $allMedia = Media::all()->toArray();
        foreach ($allMedia as $key => $media) {
            $category = Category::find($media['category_id']);
            $allMedia[$key]['category'] = $category->name;
        }
        return view('admin.list_media', compact('allMedia'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddMedia()
    {
        $categories = Getters::getCategories();
        return view('admin.add_media', compact('categories'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function postAddMedia(Request $request)
    {
        $rules = [
            'url' => 'required|url|max:255|unique:media,url',
            'category_id' => 'required',
            'publish_date_time' => 'date_format:Y-m-d H:i:s',
            'meta_tags' => 'max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('media.get_add')
                ->withErrors($validator)
                ->withInput();
        }

        $media = new Media();

        $media->url = $request->url;
        $media->title = $request->title;
        $media->thumb = $request->thumb;
        $media->category_id = $request->category_id;
        $media->site_name = $request->site_name;
        $media->publish_date_time = $request->publish_date_time;
        $media->meta_tags = $request->meta_tags;
        $media->user_id = Auth::user()->id;


        $media->save();

        return redirect()->route('media.get_add');
    }

    public function deleteMedia($id)
    {
        $model = Media::find($id);
        if (!$model) {
            return '<h1>No media found!</h1>';
        }
        Media::destroy($id);

        return redirect()->route('media.get_list');
    }

    public function getSeo()
    {
        $seoModel = new Seo;
        $seo = $seoModel::all()->first();
        if (empty($seo)) {
            return view('admin.add_seo');
        }
        return view('admin.add_seo', compact('seo'));
    }

    public function postSeo(Request $request)
    {
        $rules = [
            'seoMeta' => 'required',
            'seoKeyWords' => 'required',
            'seoTitle' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('seo.get_add')
                ->withErrors($validator)
                ->withInput();
        }

        $seoModel = new Seo;
        $seo = $seoModel::all()->first();
        if (!empty($seo)) {
            Seo::where('id', $seo->id)
                ->update([
                    'meta_description' => $request->seoMeta,
                    'keywords' => $request->seoKeyWords,
                    'title' => $request->seoTitle
                ]);
        } else {
            $seoModel = new Seo;
            $seoModel->meta_description = $request->seoMeta;
            $seoModel->keywords = $request->seoKeyWords;
            $seoModel->title = $request->seoTitle;
            $seoModel->save();
        }
        return redirect()->route('seo.get_add');
    }

    public function getAds()
    {
        $adsModel = new Seo;
        $ads = $adsModel::all()->first();
        if (empty($ads)) {
            return view('admin.add_ads');
        }
        return view('admin.add_ads', compact('ads'));
    }

    public function postAds(Request $request)
    {

    }
}