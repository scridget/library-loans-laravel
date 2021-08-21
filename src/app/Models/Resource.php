<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    const FORMAT_BOOK = 1;
    const FORMAT_AUDIO_BOOK = 2;
    const FORMAT_DVD = 3;
    const FORMAT_VIDEO_GAME = 4;
    const FORMAT_BOARD_GAME = 5;

    const FORMATS = [
        self::FORMAT_BOOK => 'Book',
        self::FORMAT_AUDIO_BOOK => 'Audio Book',
        self::FORMAT_DVD => 'Blu-Ray/DVD',
        self::FORMAT_VIDEO_GAME => 'Video Game',
        self::FORMAT_BOARD_GAME => 'Board Game',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'author',
        'barcode',
        'format',
    ];

    public function institution()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }
}
