<?php

namespace App\Http\Controllers;

use App\Core\Entity\Getters;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class AdminController extends Controller
{
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



        dd($request);

        return redirect()->route('media.get_add');
    }
}