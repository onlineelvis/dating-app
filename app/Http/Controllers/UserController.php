<?php

namespace App\Http\Controllers;




use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfilePictureRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EmailRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        return view('auth.user.profile', compact('user'));
    }

    public function edit(User $user) {

        return view('auth.user.edit', compact('user'));

    }


    public function update(User $user, UserRequest $request) {

            $user->update([
                'gender' => $request->get('gender'),
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'location' => $request->get('location'),
                'description' => $request->get('description'),
            ]);

            return redirect(route('user.profile', compact('user')));

    }

    public function userFilter(User $user) {

        return view('auth.user.filter',compact('user'));

    }

    public function userFilterUpdate(User $user, Request $request) {

        if ($user->minMax($request->get('min_age'), $request->get('max_age'))) {

            $user->update([
                'min_age' => $request->get('min_age'),
                'max_age' => $request->get('max_age'),
                'sex' => $request->get('sex'),
            ]);

            return redirect(route('user.profile', compact('user')));
        }


        return redirect()->back()->with('status', 'Min age cant be bigger then max age');

    }

    public function toPassword(User $user) {

        return view('auth.user.password', compact('user'));

    }

    public function updatePassword(User $user, PasswordRequest $request) {

        $user->update([
            'password' => $request->get('password'),

        ]);

        return view('auth.user.profile', compact('user'));
    }


    public function toEmail(User $user) {

        return view('auth.user.email', compact('user'));

    }

    public function userEmailUpdate(User $user, EmailRequest $request) {

        $user->update([

            'email' => $request->get('email')

        ]);

        return view('auth.user.profile', compact('user'));
    }


    public function profilePicture(User $user) {

        return view('auth.user.profilePicture', compact('user'));

    }

    public function uploadPicture(User $user, ProfilePictureRequest $request) {


        $user->deleteDislikes();

        if(isset($user->picture)) {
            Storage::delete($user->picture);
        }

        $user->update([
            'picture' => $request->file('picture')->store('/pictures','public'),
        ]);

        return redirect(route('user.profile'))->with('pictureStatus', 'Profile picture uploaded successfully');
    }

    public function show() {

            $userAuth = auth()->user();

            $user = $userAuth->WithoutAuthUser()->WithoutRating()->UserAge()->UserGender()->inRandomOrder()->first();

        return view('auth.user.show',compact('user'));
    }




    public function showDateUser(User $user) {

        return view('auth.dating.profile',compact('user'));

    }

    public function match() {

        $authUser = auth()->user();
        $id = $authUser->id;

        $users = User::match($id)->get();

        return view('auth.matches.matches',compact('users', 'authUser'));

    }


}
