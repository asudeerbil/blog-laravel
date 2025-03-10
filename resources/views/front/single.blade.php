@extends('front.layouts.master')
@section('title',$article->title)
@section('header-image', asset('front/assets/img/blogg.jpg'))
@section('content')
<div class="col-md-9  col-xl-7">
    {{$article->content}}
    <span class="text-danger">Number of views: <b>{{$article->hit}}</b></span>

</div>

@include('front.widgets.categoryWidget')
@endsection