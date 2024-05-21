<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'body',
        'image',
        'is_published',
        'user_id',
    ];

    protected $casts = [
        'body' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($blog) {
            // Delete the image associated with the blog from storage
            Storage::disk('public')->delete($blog->image);
        });
    }
}
