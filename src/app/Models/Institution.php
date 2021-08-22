<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Loan;
use App\Traits\Locatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * int $id
 * string $name
 * string $address1
 * string $address2
 * string $city
 * string $state
 * string $zip
 * string $country
 * string $phone
 * string $barcode
 * date $created_at
 * date $modified_at
 */

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

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
