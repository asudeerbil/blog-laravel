@extends('back.layouts.master')
@section('title','')

@section('content')
<div class="container text-center" style="margin-top: 50px;">
        <!-- Başlık -->
        <h1 class="display-3 font-weight-bold">Hello, {{$admin->name}}</h1>
        
        <!-- Fotoğraf -->
        <div class="mt-4">
            <img src="https://t4.ftcdn.net/jpg/04/75/00/99/360_F_475009987_zwsk4c77x3cTpcI3W1C1LU4pOSyPKaqi.jpg" class="img-fluid" alt="Admin Image">
        </div>
    </div>
@endsection