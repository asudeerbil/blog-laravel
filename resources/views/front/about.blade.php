@extends('front.layouts.master')
@section('title', 'About Me')
@include('front.widgets.aboutheader', ['about' => $about])
@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{$about->content}}</p>
            </div>
        </div>
    </div>
</main>
@endsection