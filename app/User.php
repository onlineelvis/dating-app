<?php

namespace App;


use Carbon\Carbon;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name','surname', 'email', 'password', 'gender', 'location', 'age', 'picture', 'min_age','max_age','sex', 'description'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make(($password));
    }

    public function setAgeAttribute($age)
    {
         $this->attributes['age'] = Carbon::now()->parse($age)->age;
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id_1');
    }

    public function ratingsBy ()
    {
        return $this->hasMany(Rating::class, 'user_id_2','id' );
    }

    public function scopeWithoutAuthUser($query)
    {
        $query->where('id','<>',auth()->id());
    }

    public function scopeWithoutRating($query)
    {
        $ratings = $this->ratings()->pluck('user_id_2');
        $query->where('id', '!=', $this->id)
            ->whereNotIn('id', $ratings->all());
    }

    public function scopeUserAge ($query)
    {
        $minAge = $this->min_age;
        $maxAge = $this->max_age;
        $query->whereBetween('age', [$minAge,$maxAge]);
    }

    public function scopeUserGender ($query)
    {
        $query->where('gender', '=', $this->sex);
    }

    public function scopeMatch($query, $id)
    {
        return $query->whereHas('ratings', function ($query) use ($id) {
            $query->where('user_id_2', $id)->where('rating','like');
        })->whereHas('ratingsBy', function ($query) use ($id) {
            $query->where('user_id_1', $id)->where('rating','like');
        });
    }

   public function deleteDislikes() {

       DB::table('ratings')->where('user_id_2', $this->id)->where('rating', 'dislike')->delete();

   }

    public function minMax (int $min, int $max) {
        if ($min < $max) {
            return true;
        }
        return false;
    }

   public function getPicture() {

        if(isset($this->picture) && strstr($this->picture, 'http')) {
            return $this->picture;
        }
        elseif ($this->picture) {
            return '/storage/'.$this->picture;
        }
        else {
            return 'default.png';
        }

   }

    public function sendMatchEmail(User $user) {

        return $this->ratings()->where('rating', 'like')->where('user_id_2', $user->id)->exists();
    }



}
