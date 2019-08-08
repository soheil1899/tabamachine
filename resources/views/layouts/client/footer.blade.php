<div class="container" dir="rtl">
    <div class="row col-12 col-lg-9 mx-lg-auto py-5">
        <div class="footer-right col-12 col-lg-3 px-4 pb-4">
            <strong>
                @lang('site.quickaccess')
            </strong>
            <ul>


                <?php
                $lang = app()->getLocale();
                $langid = \App\Lang::where('lang', $lang)->first();
                $menu = \App\Menu_group::where('lang_id', $langid['id'])->with('submenus')->first()->submenus()->get();

                ?>


                @foreach($menu as $key=>$item)
                    @if($item['url'] != 'machine')
                        <li class="nav-item active pl-2">
                            <a class="nav-link p-0" href="/{{app()->getLocale()}}/{{$item['url']}}">{{$item['name']}}</a>
                        </li>
                    @endif

                @endforeach
                <li class="nav-item pl-2">
                    <a class="nav-link p-0" href="/media/cite/TABAMACHINE_{{app()->getLocale()}}.pdf">@lang('site.catalog')</a>
                </li>
            </ul>
        </div>

        <div class="footer-left col-12 col-lg-9 px-4">
            <strong>
                @lang('site.accesspoints')
            </strong>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="fas fa-map-marked-alt mx-2"></i>

                        @lang('site.address')
                        :</strong>
                </div>
                <div class="col-9">
                    {{$setting['address']}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="fas fa-phone mx-2"></i>

                        @lang('site.telephone')
                        :</strong>
                </div>
                <div class="col-9">
                    {{$setting['tellphone']}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="fas fa-mobile-alt mx-2"></i>

                        @lang('site.mobile')
                        :</strong>
                </div>
                <div class="col-9">
                    {{$setting['mobile']}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <strong>
                        <i class="far fa-envelope mx-2"></i>

                        @lang('site.email')
                        :</strong>
                </div>
                <div class="col-9">
                    {{$setting['email']}}
                </div>
            </div>
        </div>
    </div>
</div>
