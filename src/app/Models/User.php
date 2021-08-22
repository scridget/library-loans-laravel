<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'barcode',
        'household_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function household() {
        return $this->belongsTo('App\Models\Household');
    }

    public function householdMembers() {
        return $this->hasMany('App\Models\User', 'household_id', 'household_id');
    }

    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function institutions() {
        return $this->belongsToMany('App\Models\Institution');
    }

    public function loans() {
        return $this->hasMany('App\Models\Loan');
    }

    public function loanAssignments() {
        return $this->hasMany('App\Models\Loan', 'assignee_id');
    }

    public function getAddress() {
        return $this->household->getAddress();
    }
}
