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


            <div class="col-8">


                <div class="card">
                    <div class="card-header">{{ __('Change password') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.passwordUpdate', $user) }}">
                            @csrf
                            @method('PATCH')


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                {{ __('Change password') }}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>

    </div>
@endsection
