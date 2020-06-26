<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    //for mass assignments
    protected $fillable = ["title", "body"];

    //relationship with user table
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * add slug 
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute() {
        return route('questions.show', $this->id);
    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }
}
