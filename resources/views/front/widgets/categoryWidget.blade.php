@isset($categories)
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <ul class="list-group">
            @foreach($categories as $cat)
            <li class="list-group-item d-flex justify-content-between align-items-center 
                @if(isset($category) && $category->slug == $cat->slug) active @endif">
                <a href="{{ route('category', $cat->slug) }}">{{ $cat->name }}</a>
                <span class="badge bg-primary">{{ $cat->articleCount() }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif