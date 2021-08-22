<?php

namespace App\Models;

use App\Traits\Locatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use Locatable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function contact()
    {
        return $this->belongsTo('App\Models\User', 'contact_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function resources()
    {
        return $this->hasMany('App\Models\Resource');
    }

    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }



}
