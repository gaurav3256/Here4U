<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['collection_id', 'name', 'path'];

    protected $casts = [
        'name' => 'array',
        'path' => 'array',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($media) {
            // Delete the image
            Storage::disk('public')->delete($media->path);
        });
    }
}
