<?php

namespace App\Models;

use App\Models\Scopes\UserNoteScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new UserNoteScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
