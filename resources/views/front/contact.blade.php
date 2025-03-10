@extends('front.layouts.master')
@section('title','Contact')
@section('header-image', 'https://img.freepik.com/free-photo/top-view-blue-monday-concept-composition-with-telephone_23-2149139103.jpg?t=st=1740662609~exp=1740666209~hmac=6e223d3d0cacd21d9de7179a8bf770df629a72017548f3484ae57c8615797283&w=1380')
@section('content')
<!DOCTYPE html>
<html lang="en">

<body>
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-8">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                    <div class="my-5">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{{route('contact.post')}}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." />
                                <label for="name">Name-Surname</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..." />
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" id="subject" name="topic" aria-label="Subject">
                                    <option value="information">Information</option>
                                    <option value="support">Support</option>
                                    <option value="general">General</option>
                                </select>
                                <label for="subject" class="label-outside">Subject</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem"></textarea>
                                <label for="message">Message</label>
                            </div>
                            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </main>
</body>

</html>
@endsection

<style>
    .label-outside {
        position: relative;
        top: -15px;
        left: 0;
        font-size: 1rem;
        color: #495057;
    }
</style>