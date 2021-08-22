<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function assignee()
    {
        return $this->belongsTo('App\Models\User', 'assignee_id');
    }

    public function resource()
    {
        return $this->belongsTo('App\Models\Resource');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    /**
     * The borrowing institution
     */
    public function institution()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    /**
     * The lending institution
     */
    public function lender()
    {
        return $this->belongsTo('App\Models\Institution', 'lender_id');
    }
}
