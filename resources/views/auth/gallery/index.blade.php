@extends('layouts.app')

@section('content')

    <style>

        .card-body {
            display: flex;
            flex-direction: column;
        }

        form {
            margin-top: auto;
        }
        body {
            background: whitesmoke;
        }
    </style>


<div class="container">

    <form action="{{route('gallery.store', $user)}}" method="post" enctype="multipart/form-data">
        @csrf

        <input name="gallery[]" type="file" multiple>
        <button class="btn btn-success mb-2" type="submit">Upload</button>

    </form>

        <div class="row">
        @forelse($user->galleries as $picture)

        <div class="col-3 card-group">
            <div class="card">

                <a href="{{$picture->getGalleryPictures()}}">
                    <img class="card-img-top" src="{{$picture->getGalleryPictures()}}" alt="">
                </a>

                <div class="card-body ">
                    <form class="text-center " action="{{route('gallery.destroy', $picture->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="w-50 btn btn-danger" type="submit"> DELETE </button>
                    </form>
                </div>

            </div>
        </div>


        @empty
            <h1>Empty gallery</h1>
        @endforelse
        </div>
</div>
@endsection
