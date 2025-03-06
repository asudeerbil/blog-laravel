@extends('back.layouts.master')
@section('title','Create Inspirational Writings')
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
                                @endforeach</div>
                                @endif
                            <form method="post" action="{{route('admin.pages.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="Form-group">
                                    <label>Inspirational Writings Title</label>
                                    <input type="text" name="title" class="form-control" required></input>
                                </div>
                                <div class="form-group">
                                     <label>Inspirational Writings Image</label>
                                     <input type="file" name="image" class="form-control" required>
                                </div>

                                
                                <div class="Form-group">
                                    <label>Inspirational Writings Content</label>
                                    <textarea name="content" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="Form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Create Inspirational Writings</button>
                                </div>
                            </form>
                        </div>
@endsection