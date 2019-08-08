@extends('layouts.client.master')

@section('content')

    <div class="container py-5" dir="rtl">

        <div class="row py-2 mb-4 page-title">
            <h1 class="mx-auto"><strong>
                    @lang('site.contactus')
                </strong></h1>
        </div>




        <contactus-component :setting="{{$setting}}" :locale="{{$lang}}"></contactus-component>

    </div>


@endsection
