@extends('layouts.client.master')

@section('content')

    <div class="container py-5" dir="rtl">

        <div class="row py-2 mb-4 page-title">
            <h1 class="mx-auto"><strong>
                    @lang('site.customer')
                </strong></h1>
        </div>


        <table class="table table-striped customertable" style="direction: rtl">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('site.companyname')</th>
                <th scope="col">@lang('site.brand')</th>
                <th scope="col">@lang('site.address')</th>
                <th scope="col">@lang('site.description')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $key=>$customer)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$customer['company_name']}}</td>
                <td>{{$customer['company_name_en']}}</td>
                <td>{{$customer['address']}}</td>
                <td>{{$customer['description']}}</td>
            </tr>
                @endforeach

            </tbody>
        </table>


    </div>


@endsection
