<?php

namespace App\Http\Controllers;

use App\Mail\UserMatch;
use App\User;
use Illuminate\Support\Facades\Mail;


class RatingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function like(User $user)
    {
        $authUser = auth()->user();
        $authUser->ratings()->create([
            'user_id_2' => $user->id,
            'rating' => 'like'
        ]);
        if ($user->sendMatchEmail($authUser)) {

            Mail::to($authUser->email)
                ->queue(new UserMatch($authUser, $user));
            Mail::to($user->email)
                ->queue(new UserMatch($user, $authUser));
        }
        return redirect()->back();
    }

    public function dislike(User $user) {

        $authUser = auth()->user();

        $authUser->ratings()->create([

            'user_id_2' => $user->id,
            'rating' => 'dislike'

        ]);

        return redirect()->back();
    }


}
