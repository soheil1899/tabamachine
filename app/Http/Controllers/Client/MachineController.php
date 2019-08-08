<?php

namespace App\Http\Controllers\Client;

use App\Article;
use App\Article_group;
use App\Gallery;
use App\Lang;
use App\Pdf;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{

    public function index($lang, $id)
    {
        $lang = Lang::where('lang', $lang)->first();


        $setting = Setting::where('lang', app()->getLocale())->first();

        $articlegroup = Article_group::where('lang_id', $lang['id'])->first();
        $articles = Article::select('id', 'title')->where([['publish', true], ['article_group_id', $articlegroup['id']]])->get();

        $machine = Article::where('id', $id)->with('keywords', 'tags', 'contents', 'user', 'attributes')->first();
        $gallery = Gallery::where('article_id', $id)->get();
        $pdf = Pdf::where('article_id', $id)->get();
        return view('machine', compact('machine', 'articles', 'setting', 'gallery', 'pdf', 'lang'));
    }


}
