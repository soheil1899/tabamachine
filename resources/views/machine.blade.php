@extends('layouts.client.master')

@section('content')

    <div class="container py-5" dir="rtl">

        <div class="row py-2 mb-4 page-title">
        <h1 class="mx-auto"><strong>
            {{$machine['title']}}
            </strong></h1>
    </div>


    <machine-component :machine="{{$machine}}" :gallery="{{$gallery}}" :pdf="{{$pdf}}" :locale="{{$lang}}"></machine-component>





</div>
{{--   {{$machine}}--}}

@endsection
