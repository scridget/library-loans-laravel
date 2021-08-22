<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  int $id
 *  int $user_id
 *  int $parent_id
 *  int $commentable_id
 *  string $commentable_type
 *  string $body
 *  date $created_at
 *  date $modified_at
 */

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent');
    }
}
