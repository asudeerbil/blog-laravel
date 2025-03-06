@extends('back.layouts.master')
@section('title','About Me')
@section('content')
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$abouts->count()}}</strong> about me found.</h6>
                        </div>
                        <div class="card-body">
             
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>image</th>
                                            
                                            <th>Transactions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($abouts as $a)
                                        <tr>
                                            
                                            <td>{{$a->name}}</td>
                                            <td><img src="{{ asset('images/' . $a->image) }}" alt="Image" width="100"></td>
                                            <td>{{$a->content}}</td>
                                            
                                            <td>
                                            <a href="{{route('admin.abouts.edit',$a->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!-- jQuery gerekli -->
<script src="https://gitbrent.github.io/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>

@endsection
