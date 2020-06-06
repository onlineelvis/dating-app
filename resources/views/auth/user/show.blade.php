@extends('layouts.app')


@section('content')

    <style>
        body {
            height: 100vh;

            background: rgb(193, 100, 255);
            background: linear-gradient(25deg, rgba(193, 100, 255, 1) 0%, rgba(203, 243, 246, 1) 49%, rgba(252, 176, 69, 1) 100%);

        }


    </style>
    <div class="container">

        <div class="row justify-content-center">


@if($user)

                <div class="card col-5" >

                    <a class="card-img-top " href="{{$user->getPicture()}}">
                        <img style="height: 60%; max-height: 450px; " class="img-fluid rounded-circle mx-auto d-block pt-3"  src="{{$user->getPicture()}}" alt="{{$user->name}}">
                    </a>

                    <div class="card-body">

                        <p class="card-text">

                        <h3>{{$user->name}}, {{$user->surname}}  ({{$user->age}})</h3>

                        <p>{{$user->description}}</p>

                        </p>

                        <div class="pb-2">

                            <form class="float-left col-2 d-inline" action="{{route('user.dislike', $user)}}" method="post">
                                @csrf
                                <button onclick="this.disabled=true;this.form.submit(); " class="btn btn-danger" type="submit"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                            </form>

                            <form class="float-right col-2 d-inline" action="{{route('user.like', $user)}}" method="post">
                                @csrf
                                <button onclick="this.disabled=true;this.form.submit(); "  class="btn btn-success" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                            </form>

                        </div>

                    </div>
                </div>





        @else
            <h1>Out of Users</h1>
        @endif
    </div>





@endsection
