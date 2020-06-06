@extends('layouts.app')



@section('content')
    <style>

        .prefix {
            color: #0c5460;
            font-weight: 700;

        }


        body {
            background: whitesmoke;
        }

    </style>

    <div class="container">
        <div class="row justify-content-center">
        @forelse($users as $user)
           <div class="col-4 card-deck pb-4">
               <div class="card">

                   <a href="{{$user->getPicture()}}">
                   <img style="height: 220px; object-fit: cover" class="card-img-top" src="{{$user->getPicture()}}" alt="Card image cap">
                   </a>

                   <div class="card-body">
                      <h3 class="prefix"> Full name:</h3>  <h5 class="card-title">  {{$user->name}}  {{$user->surname}}  </h5>   <span class="prefix"> Age: </span> {{$user->age}}
                       <h3 class="prefix"> Location:</h3> <h5 class="card-title">  {{$user->location}}   </h5>
                       <h3 class="prefix"> About me:</h3> <p class="card-text">  {{$user->description}} </p>

                       <h3 class="prefix">User Gallery: </h3>
                       @forelse($user->galleries as $picture)

                           <a href="{{$picture->name}}">
                               <img class="mb-1 mr-1 w-25"  src="{{$picture->name}}" alt="">
                           </a>
                       @empty
                           <h5>
                               Empty gallery
                           </h5>

                       @endforelse
                   </div>
               </div>
           </div>

            @empty
            <h1 class="text-center"> No matches :( </h1>

            @endforelse
        </div>
    </div>
@endsection


