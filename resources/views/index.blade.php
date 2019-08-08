@extends('layouts.client.master')

@section('content')

@if(count($slider) > 0)
    <div id="slidertop" class="container carousel slide mt-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slidertop" data-slide-to="0" class="active"></li>
            <?php

            for ($i = 1; $i<count($slider); $i++){
            ?>

            <li data-target="#slidertop" data-slide-to="{{$i}}"></li>
                <?php
                }
                ?>
        </ol>
        <div class="carousel-inner">

            <?php
            $x = 0;
            foreach ($slider as $image){
            ?>
            <div class="carousel-item @if($x==0) active @endif">
                <a title="{{$image['title']}}" href="/{{app()->getLocale()}}/machine/{{$image['link']}}">
                    <img src="/media/slider/{{$image['slider_id']}}/original_{{$image['image']}}.png" width="100%"
                         height="500px" alt="...">
                </a>
            </div>
            <?php
            $x++;
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#slidertop" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slidertop" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    @endif



    <div class="container">

        <?php
        $x = 1;
        foreach ($threearticles as $article){
        ?>
        <div class="card my-5" @if($x%2 == 1) dir="ltr" @endif>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/media/article/{{$article['id']}}_original.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>
                                {{$article['title']}}
                            </strong>
                        </h5>
                        <p class="card-text" dir="rtl">
                            {!!$article['minitext']!!}
                        </p>

                        <a href="/{{app()->getLocale()}}/machine/{{$article['id']}}" class="btn btn-danger btn-sm pointer seemore">@lang('site.seeproduct')</a>

                    </div>
                </div>
            </div>
        </div>
        <?php
        $x++;
        }
        ?>

        <div class="my-5 aboutus-back">


            <div>
                <strong>
                    @lang('site.abouttaba')
                </strong>
                <p dir="rtl">
                    {!!  $setting['aboutus'] !!}
                </p>
            </div>

        </div>


    </div>



@endsection
