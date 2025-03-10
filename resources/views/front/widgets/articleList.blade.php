@section('header-image', asset('front/assets/img/blogg.jpg'))
@if(count($articles)>0)
@foreach($articles as $article)
<div class="post-preview">
    <a href="{{route('single', ['category' => $article->getCategory->slug, 'slug' => $article->slug])}}">

        <h2 class="post-title">{{$article->title}}</h2>
        <!--<img src="{{$article->image}}"/>-->
        <h3 class="post-subtitle">{{Str::limit($article->content, 30)}}</h3>
    </a>
    <p class="post-meta">

        <a href="#!">{{$article->getCategory->name}}</a>





        <span class="float-end">{{$article->created_at->diffForHumans()}}</span>

    </p>
</div>
@if(!$loop->last)
<hr class="my-4" />
@endif
@endforeach

<!-- Sayfalama Linkleri -->
<div class="d-flex justify-content-center mt-4">
    {{ $articles->links('pagination::bootstrap-4') }}
</div>
@else
<div class="alert alert-danger">
    <h1>No articles were found for this category</h1>
</div>
@endif