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


            <div class="col-5">

                <form method="POST" action="{{ route('user.filter.update', $user) }}">
                    @csrf
                    @method('PATCH')

                    <label for="min_age">Min age</label>

                    <input id="min_age" name="min_age" type="range" min="18" max="65" value="{{ old('min_age',$user->min_age) }}">
                    <span id="ageMin"></span>

                    <br>

                    <label for="max_age">Max age</label>

                    <input id="max_age" name="max_age" type="range" min="18" max="65" value="{{ old('max_age',$user->max_age) }}">
                    <span id="ageMax"></span>

                    <br>

                    <select name="sex" id="sex">
                        <option value="male" {{ old('sex',$user->sex) == 'male' ? 'selected' : ''}}>Male</option>
                        <option value="female" {{ old('sex',$user->sex) == 'female' ? 'selected' : ''}}>Female</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>


            </div>


        </div>


    </div>



<script>
    var min = document.getElementById("min_age");
    var minAge = document.getElementById("ageMin");
    minAge.innerHTML = min.value;

    min.oninput = function() {
        minAge.innerHTML = this.value;
    }

    var max = document.getElementById("max_age");
    var maxAge = document.getElementById("ageMax");
    maxAge.innerHTML = max.value;

    max.oninput = function() {
        maxAge.innerHTML = this.value;
    }
</script>
@endsection
