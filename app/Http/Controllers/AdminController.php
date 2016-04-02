<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use App\Core\Entity\Getters;
use App\Media;
use App\Seo;
use App\User;
use Auth;
use Essence\Essence;
use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
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
            'publish_date_time' => 'date_format:Y-m-d H:i',
            'meta_tags' => 'max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $request->session()->flash('alert-danger', 'Errors found !');
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
        $media->author_name = $request->author_name;
        $media->publish_date_time = $request->publish_date_time;
        $media->meta_tags = $request->meta_tags;
        $media->user_id = Auth::user()->id;


        $media->save();

        $request->session()->flash('alert-success', 'Added successfully');
        return redirect()->route('media.get_add');
    }

    public function deleteMedia(Request $request, $id)
    {
        $model = Media::find($id);
        if (!$model) {
            $request->session()->flash('alert-success', 'Errors founded !');
        }
        Media::destroy($id);

        $request->session()->flash('alert-success', 'Deleted successfully');
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
            $request->session()->flash('alert-success', 'Errors Found !');
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
        $request->session()->flash('alert-success', 'Added successfully');
        return redirect()->route('seo.get_add');
    }

    public function getAds()
    {
        $categories = Category::all();
        return view('admin.add_ads', compact('categories'));
    }

    public function postAds(Request $request)
    {
        list($adsUpdateCheck, $rules) = $this->checkAdsOld($request->category_id);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $request->session()->flash('alert-success', 'Errors Founded !!');
            return redirect()
                ->route('ads.get_add')
                ->withErrors($validator)
                ->withInput();
        }

        // todo: Refactoring
        $valuesToUpdate = [
            "code_top" => $request->top_code,
            "code_aside" => $request->aside_code,
            "category_id" => $request->category_id
        ];

        if ($request->file('top_image')) {
            $topImg = $this->uploadImage($request->file('top_image'), 'top');
            $valuesToUpdate["image_top"] = $topImg;
        }
        if ($request->file('aside_image')) {
            $asideImg = $this->uploadImage($request->file('aside_image'), 'aside');
            $valuesToUpdate["image_aside"] = $asideImg;
        }

        if (!empty($adsUpdateCheck)) {
            Ads::where('id', $adsUpdateCheck->id)
                ->update($valuesToUpdate);
        } else {
            $adsModel = new Ads();
            $adsModel->code_top = $request->top_code;
            $adsModel->code_aside = $request->aside_code;
            $adsModel->category_id = $request->category_id;
            if (isset($topImg)) {
                $adsModel->image_top = $topImg;
            }
            if (isset($asideImg)) {
                $adsModel->image_aside = $asideImg;
            }

            $adsModel->save();
        }
        return redirect()->route('ads.get_add');
    }

    public function uploadImage($image, $type)
    {
        $random = rand();
        $filename = time() . '_' . $random . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/' . $filename);

        Image::configure(array('driver' => 'gd'));
        if ($type == 'top') {
            Image::make($image->getRealPath())->resize(728, 90)->save($path);
        } elseif ($type == 'aside') {
            Image::make($image->getRealPath())->resize(300, 600)->save($path);
        }

        return $filename;
    }

    /**
     * @param $category_id
     * @return array
     */
    public function checkAdsOld($category_id)
    {
        $adsModel = new Ads();
        $ads = $adsModel::where('category_id', '=', $category_id)->first();
        if (!empty($ads)) {
            $rules = [
                // Update record -> rules
                'category_id' => 'required',
                'top_code' => 'required',
                'aside_code' => 'required',
                'top_image' => 'mimes:jpeg,jpg,,gif,bmp,png,swf',
                'aside_image' => 'mimes:jpeg,jpg,,gif,bmp,png,swf',
            ];
        } else {
            // Make new record -> rules
            $rules = [
                'category_id' => 'required',
                'top_code' => 'required',
                'aside_code' => 'required',
                'top_image' => 'required|mimes:jpeg,jpg,,gif,bmp,png,swf',
                'aside_image' => 'required|mimes:jpeg,jpg,,gif,bmp,png,swf',
            ];
        }
        return array($ads, $rules);
    }

    public function getUsers()
    {
        $users = User::all(['id', 'email', 'role'])->where('role', 1);
        return view('admin.list_users', compact('users'));
    }


    public function getAddUser()
    {
        return view('admin.add_user');
    }


    public function postAddUser(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $request->session()->flash('alert-success', 'Errors Founded !');
            return redirect()
                ->route('users.get_add')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 1;
        $user->save();

        $request->session()->flash('alert-success', 'Added successfully');
        return redirect()->route('users.get_list');
    }


    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash('alert-success', 'Errors Founded !');
        }

        // delete only admins but not the main one
        if ($user->role != 0) {
            User::destroy($id);
        }

        $request->session()->flash('alert-success', 'Deleted successfully');
        return redirect()->route('users.get_list');
    }


    public function getAdsJson(Request $request)
    {
        $ads = Ads::leftJoin('categories', function ($join) {
            $join->on('ads.category_id', '=', 'categories.id');
        })->where('categories.name', strtolower($request->type))
            ->first([
                'ads.code_top',
                'ads.image_top',
                'ads.code_aside',
                'ads.image_aside',
            ]);

        if (!$ads) {
            return json_encode('null');
        }

        return $ads;
    }

    public function getVideoData(Request $request)
    {
        if (empty($request->url)) {
            return redirect()->route('media.get_add');
        }

        $essence = new Essence();
        $media = $essence->extract($request->url);


        if (!$media) {
            return redirect()->route('media.get_add');
        }

        return $media;
    }
}