<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name'];


    public function user() {

        return $this->belongsTo(User::class);

    }

    public function getGalleryPictures()
    {
        if (isset($this->name) && strstr($this->name, 'http')) {
            return $this->name;
        } elseif (isset($this->name)) {
            return '/storage/'.$this->name;
        } else {

         return '/storage/galleries/default.gif';

        }
    }
}
