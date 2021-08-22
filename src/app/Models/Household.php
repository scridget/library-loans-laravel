<?php

namespace App\Models;

use App\Traits\Locatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use Locatable;
    use HasFactory;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
