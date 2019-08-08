@extends('layouts.client.master')

@section('content')

    <div class="container py-5" dir="rtl">

        <div class="row py-2 page-title mb-4">
            <h1 class="mx-auto"><strong>
                    @lang('site.abouttaba')
                </strong></h1>
        </div>

        <aboutus-component :aboutus="{{$setting}}" :locale="{{$lang}}"></aboutus-component>

    </div>


@endsection
