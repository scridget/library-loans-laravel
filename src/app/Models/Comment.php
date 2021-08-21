<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'parent');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Comment', 'parent');
    }

    public function institution()
    {
        return $this->hasOne('App\Models\Institution');
    }
}
