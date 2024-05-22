<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'original_file',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($team) {
            // Delete the image associated with the team member from storage
            Storage::disk('public')->delete($team->image);
        });
    }
}
