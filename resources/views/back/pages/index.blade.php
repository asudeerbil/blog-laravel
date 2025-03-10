@extends('back.layouts.master')
@section('title','All Inspirational Writings')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><strong>{{$pages->count()}}</strong> inspirational writings found.</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>IW Title</th>
                        <th>IW Image</th>
                        <th>IW Content</th>

                        <th>Transactions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pages as $p)
                    <tr>

                        <td>{{$p->title}}</td>
                        <td><img src="{{ asset('images/' . $p->image) }}" alt="Image" width="100"></td>
                        <td>{{$p->content}}</td>



                        <td>
                            <a href="{{route('admin.pages.edit',$p->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <form action="{{ route('admin.pages.destroy', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" title="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this IW?')">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
    @section('css')
    <link href="https://gitbrent.github.io/bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">
    @endsection
    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://gitbrent.github.io/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>

    @endsection