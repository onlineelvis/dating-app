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
    <div class="col-6">

        <div class="card">
            <div class="card-header">{{ __('Change email') }}</div>

            <div class="card-body">

                <form method="POST" action="{{ route('user.emailUpdate', $user) }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email',$user->email) }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Change email') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
