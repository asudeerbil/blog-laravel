@extends('back.layouts.master')
@section('title',$about->title. 'Update About Me')
@section('content')
{!! Flasher::render() !!}
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
        <form method="post" action="{{route('admin.abouts.update',$about->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="Form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$about->name}}" required></input>
            </div>

            <div class="Form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="4">{!!$about->content!!}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($about->image != 'default.jpg')
                <div class="mt-2">
                    <img src="{{ asset('images/' . $about->image) }}" alt="Current Image" width="150">
                </div>
                @else
                <p>No image uploaded</p>
                @endif
            </div>

            <div class="Form-group">
                <button type="submit" class="btn btn-primary btn-block">Update About Me</button>
            </div>
        </form>
    </div>
    @endsection