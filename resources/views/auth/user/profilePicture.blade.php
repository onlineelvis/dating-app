@extends('layouts.app')


@section('content')

    <style>

        body {
            height: 100vh;
            background: rgb(193,100,255);
            background: linear-gradient(25deg, rgba(193,100,255,1) 0%, rgba(203,243,246,1) 49%, rgba(252,176,69,1) 100%);

        }

        .inputfile {
           font-size: 20px;
           padding-bottom: 20px;
        }



    </style>


<div class="container">
    <div class="row justify-content-center">

        <div class="col-5">

            <form class="text-center" action="{{route('user.uploadPicture', $user)}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <input class=" inputfile" name="picture" type="file">
                <button class="btn btn-success" type="submit">Upload</button>




            </form>

        </div>

    </div>

    <div class="row">

        <h1 class="text-center" >Update your profile picture at least once a week and increase your MATCH chance!</h1>

    </div>
</div>




@endsection
