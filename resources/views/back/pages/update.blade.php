@extends('back.layouts.master')
@section('title',$page->title. 'Update Inspirational Writings')
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
        <form method="post" action="{{route('admin.pages.update',$page->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="Form-group">
                <label>Inspirational Writings Title</label>
                <input type="text" name="title" class="form-control" value="{{$page->title}}" required></input>
            </div>

            <div class="Form-group">
                <label>Inspirational Writings Content</label>
                <textarea name="content" class="form-control" rows="4">{!!$page->content!!}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Inspirational Writing Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($page->image != 'default.jpg')
                <div class="mt-2">
                    <img src="{{ asset('images/' . $page->image) }}" alt="Current Image" width="150">
                </div>
                @else
                <p>No image uploaded</p>
                @endif
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $page->order) }}" min="1">
            </div>
            <div class="Form-group">
                <button type="submit" class="btn btn-primary btn-block">Update Inspirational Writings</button>
            </div>
        </form>
    </div>
    @endsection