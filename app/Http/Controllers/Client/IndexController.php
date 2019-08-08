<?php

namespace App\Http\Controllers\Client;

use App\Article;
use App\Article_group;
use App\Contactus;
use App\Customer;
use App\Image;
use App\Lang;
use App\Setting;
use App\Slider;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index($lang='fa')
    {
        $lang = Lang::where('lang', $lang)->first();


        $setting = Setting::where('lang', app()->getLocale())->first();
        $slider = Slider::select('id')->where('title', app()->getLocale())->first();
        $slider = Image::where('slider_id', $slider['id'])->get();
        $articlegroup = Article_group::where('lang_id', $lang['id'])->first();
        $articles = Article::select('id', 'title')->where([['publish', true], ['article_group_id', $articlegroup['id']]])->get();
        $threearticles = Article::select('id', 'title', 'image', 'minitext')->where([['publish', true],['article_group_id', $articlegroup['id']]])->orderBy('order', 'asc')->limit(3)->get();
        return view('index', compact('articles', 'slider', 'threearticles', 'setting', 'lang'));
    }


    public function aboutus($lang)
    {
        $lang = Lang::where('lang', $lang)->first();

        $setting = Setting::where('lang', app()->getLocale())->first();
        $articlegroup = Article_group::where('lang_id', $lang['id'])->first();
        $articles = Article::select('id', 'title')->where([['publish', true], ['article_group_id', $articlegroup['id']]])->get();
        return view('aboutus', compact('setting', 'articles', 'lang'));
    }

    public function contactus($lang)
    {
        $lang = Lang::where('lang', $lang)->first();

        $setting = Setting::where('lang', app()->getLocale())->first();
        $articlegroup = Article_group::where('lang_id', $lang['id'])->first();
        $articles = Article::select('id', 'title')->where([['publish', true], ['article_group_id', $articlegroup['id']]])->get();
        return view('contactus', compact('setting', 'articles', 'lang'));
    }
    public function savemessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'family' => 'required',
            'email' => 'required | email',
            'mobile' => 'required | min:11 | max:11',
            'address' => 'required',
            'message' => 'required | min:5',
        ]);


        $save = new Contactus();
        $save->name = $request->name;
        $save->family = $request->family;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        $save->address = $request->address;
        $save->message = $request->message;

        $save->save();
    }

    public function customer($lang)
    {
        $customers = Customer::all();
        $lang = Lang::where('lang', $lang)->first();

        $setting = Setting::where('lang', app()->getLocale())->first();
        $articlegroup = Article_group::where('lang_id', $lang['id'])->first();
        $articles = Article::select('id', 'title')->where([['publish', true], ['article_group_id', $articlegroup['id']]])->get();
        return view('customer', compact('setting', 'articles', 'customers', 'lang'));
    }


    public function changelanguage(Request $request)
    {
        app()->setLocale($request->language);
        $address = explode('/',$request->location,5);
        if(isset($address[4])) {
            $new = "http://{$_SERVER['HTTP_HOST']}/" . $request->language . '/' . $address[4];
        }else{
            $new = "http://{$_SERVER['HTTP_HOST']}/" . $request->language;
        }
        return $new;
    }

}
