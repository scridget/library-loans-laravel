<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * increments $id
 * string $name
 * string $email
 * string $phone
 * string $barcode
 * int $preferred_contact
 * date $created_at
 * date $modified_at
 */

class Patron extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}
