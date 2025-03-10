@extends('front.layouts.master')
@section('title','HomePage')
@section('header-image', asset('front/assets/img/blogg.jpg'))

@section('content')

<div class="col-md-9 col-xl-7">
    @include('front.widgets.articleList')
</div>

@include('front.widgets.categoryWidget')

@endsection