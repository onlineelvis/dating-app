@extends('layouts.app')

@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #28223f;
            font-family: Montserrat, sans-serif;

            display: flex;
            align-items: center;
            justify-content: center;

            min-height: 100vh;
            margin: 0;
        }

        h3 {
            margin: 10px 0;
        }

        h6 {
            margin: 5px 0;
            text-transform: uppercase;
        }

        p {
            font-size: 14px;
            line-height: 21px;
        }

        .card-container {
            background-color: #231e39;
            border-radius: 5px;
            box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
            color: #b3b8cd;
            padding-top: 30px;
            position: relative;
            width: 350px;
            max-width: 100%;
            text-align: center;
        }

        .card-container .pro {
            color: #231e39;
            background-color: #febb0b;
            border-radius: 3px;
            font-size: 14px;
            font-weight: bold;
            padding: 3px 7px;
            position: absolute;
            top: 30px;
            left: 30px;
        }

        .card-container .round {
            border: 1px solid #03bfcb;
            border-radius: 50%;
            padding: 7px;
        }

        button.primary {
            background-color: #03bfcb;
            border: 1px solid #03bfcb;
            border-radius: 3px;
            color: #231e39;
            font-family: Montserrat, sans-serif;
            font-weight: 500;
            padding: 10px 25px;
        }

        button.primary:hover {
            background-color: transparent;
            color: #02899c;
        }

        button.primary.ghost {
            background-color: transparent;
            color: #02899c;
        }

        button.primary.ghost:hover{
            color: #231e39;
            background-color: #03bfcb;
        }

        a {
            text-decoration: none !important;
        }

        li:hover {
            background: whitesmoke;
        }



        .skills {
            background-color: #1f1a36;
            text-align: left;
            padding: 15px;
            margin-top: 30px;
        }

        .skills ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .skills ul li {
            border: 1px solid #2d2747;
            border-radius: 2px;
            display: inline-block;
            font-size: 12px;
            margin: 0 7px 7px 0;
            padding: 7px;
        }
    </style>

    <div class="card-container">
        <span class="pro">PROFILE</span>
        <img
            class="w-75 round"
            src="{{$user->getPicture()}}"
            alt="user"
        />
        <h6> {{$user->location}}</h6>
        <p>
            {{$user->name}} {{$user->surname}}
        </p>
        <p> ({{$user->age}}) </p>

        <p class="p-2"> {{$user->description}} </p>

        <div class="buttons">
            <a href="{{route('user.show', $user)}}">
            <button class="primary">
                Start dating
            </button>
            </a>

            <a href="{{route('user.filter', $user)}}">
            <button class="primary ghost">
                Dating filter
            </button>
            </a>
        </div>
        <div class="skills">
            <h6>Actions</h6>
            <ul>
                <li><a  href="{{route('user.edit', $user)}}">  Edit Profile  </a></li>
                <li><a  href="{{route('gallery.index', $user)}}"> Gallery </a></li>
                <li><a  href="{{route('user.matches', $user)}}">  Matches </a></li>
                <li><a  href="{{route('user.password', $user)}}"> Change password </a></li>
                <li><a  href="{{route('user.email', $user)}}"> Change email </a></li>
                <li><a  href="{{route('user.profile.picture', $user )}}"> Change picture </a></li>
            </ul>
        </div>
    </div>
















@endsection
