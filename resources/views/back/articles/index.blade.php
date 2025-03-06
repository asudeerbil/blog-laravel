@extends('back.layouts.master')
@section('title','All Articles')
@section('content')
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}}</strong> articles found.</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>Article Title</th>
                                            <th>Category</th>
                                            <th>Number of Views</th>
                                            <th>Creation date</th>
                                            <th>Status</th>
                                            <th>Transactions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($articles as $a)
                                        <tr>
                                            
                                            <td>{{$a->title}}</td>
                                            <td>{{$a->getCategory->name}}</td>
                                            <td>{{$a->hit}}</td>
                                            <td>{{$a->created_at->diffForHumans()}}</td>
                                            <td>
                                            <input class="switch" type="checkbox" article-id="{{$a->id}}" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger" @if($a->status==1) checked @endif data-toggle="toggle">
                                            </td>

                                            <td>
                                                <a href="{{route('single',[$a->getCategory->slug,$a->slug])}}" title="Show" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('admin.articles.edit',$a->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                <a href="{{route('admin.delete.article',$a->id)}}" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
<script>
    $(function() {
        $('input[type="checkbox"]').change(function() {
            var id = $(this).attr('article-id');  // article-id'yi almak için doğru yöntem
            var statu = $(this).prop('checked');  // Switch'in durumunu almak
            $.get("{{route('admin.switch')}}", {id: id, statu: statu}, function(data, status) {
                console.log(data);  // Sunucudan gelen yanıtı konsola yazdırma
            });
        });
    });
</script>
@endsection
