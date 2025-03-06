@extends('front.layouts.master')
@section('title','Inspirational Writings')
@section('header-image', 'https://acxngcvroo.cloudimg.io/v7/https://www.scienceinschool.org/wp-content/uploads/2021/09/card_teach.jpg')
@section('content')
<body>
    
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @foreach($page as $p)
                        <h2 class="section-heading">{{$p->title}}</h2>
                        <p>{{$p->content}}</p>
                        <img class="img-fluid" src="{{ asset('images/' . $p->image) }}" alt="Image"/>
                    @endforeach  <!-- Burada foreach döngüsünü kapatmayı unutmayın -->
                </div>
            </div>
        </div>
    </article>
</body>

@endsection
