<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = [
         'user_id_2', 'rating'
    ];

    public function rating() {

        return $this->belongsTo(User::class, 'user_id_2');

    }


    public function scopeMatch($query, $id)
    {
        return $query->whereHas('ratings', function ($query) use ($id) {
            $query->where('user_id_2', $id)->where('rating','like');
        })->whereHas('ratingsBy', function ($query) use ($id) {
            $query->where('user_id_1', $id)->where('rating','like');
        });
    }
}
