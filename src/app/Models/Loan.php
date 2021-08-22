<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Institution;
use App\Models\Patron;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * int $id
 * int $patron_id
 * int $institution_id
 * string $title
 * string $internal_barcode
 * string $external_barcode
 * int $format
 * int $status
 * int $binder_pocket
 * date $requested_at
 * date $ordered_at
 * date $received_at
 * date $returned_at
 * date $created_at
 * date $modified_at
 */

class Loan extends Model
{
    use HasFactory;
    
    public function patron()
    {
        return $this->belongsTo(Patron::class);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
