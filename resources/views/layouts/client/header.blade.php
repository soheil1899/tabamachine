<div class="container myheader" dir="rtl">

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row top-header p-2 pr-4 pr-lg-2">
                <i class="fas fa-mobile-alt mx-2"></i>
                <label class="mx-2">{{$setting['mobile']}}</label>
                <label class="mx-2">|</label>
                <i class="fas fa-phone mx-2"></i>
                <label class="mx-2">{{$setting['tellphone']}}</label>
                <label class="mx-2">|</label>
                <i class="fas fa-envelope mx-2"></i>
                <label class="mx-2">{{$setting['email']}}</label>
                <label class="mx-2">|</label>

                <header-language :locale="{{$lang}}"></header-language>


            </div>


            <div class="row header-menu">
                <nav class="navbar navbar-expand-lg navbar-light pr-0">
                    <button class="navbar-toggler ml-auto mr-4" type="button" data-toggle="collapse"
                            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse pr-4 pr-lg-0" id="navbarNav">

                        <?php
                        $lang = app()->getLocale();
                        $langid = \App\Lang::where('lang', $lang)->first();
                        $menu = \App\Menu_group::where('lang_id', $langid['id'])->with('submenus')->first()->submenus()->get();


                        ?>


                        <ul class="navbar-nav float-right p-0">
                            @foreach($menu as $key=>$item)
                                @if($item['url'] == 'machine')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$item['name']}}
                                        </a>
                                        <div id="header-machine" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach(\App\Article_group::where('url',app()->getLocale().'product')->with('articles')->first()->articles()->get() as $article)
                                                <a class="dropdown-item mb-2"
                                                   href="/{{app()->getLocale()}}/{{$item['url']}}/{{$article['id']}}">{{$article['title']}}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @else

                                    <li class="nav-item active pl-2">
                                        <a class="nav-link"
                                           href="/{{app()->getLocale()}}/{{$item['url']}}">{{$item['name']}}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li class="nav-item pl-2">
                                <a class="nav-link"
                                   href="/media/cite/TABAMACHINE_{{app()->getLocale()}}.pdf">@lang('site.catalog')</a>
                            </li>
                        </ul>


                    </div>
                </nav>
            </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block p-3">
            <a class="pagelogo" href="/" title="تابا ماشین">
                <img src="/media/cite/logo.png" width="136px" height="80px" alt="">
            </a>
        </div>
    </div>


</div>
