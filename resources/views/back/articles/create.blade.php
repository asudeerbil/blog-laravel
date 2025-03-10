@extends('back.layouts.master')
@section('title','Create Articles')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
        @endif
        <form method="post" action="{{route('admin.articles.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="Form-group">
                <label>Article Title</label>
                <input type="text" name="title" class="form-control" required></input>
            </div>
            <div class="Form-group">
                <label>Article Category</label>
                <select class="form-control" name="category_id" required>
                    <option value="">Make a choice</option>
                    @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="Form-group">
                <label>Article Content</label>
                <textarea name="content" class="form-control" rows="4"></textarea>
            </div>
            <div class="Form-group">
                <button type="submit" class="btn btn-primary btn-block">Create Article</button>
            </div>
        </form>
    </div>
    @endsection