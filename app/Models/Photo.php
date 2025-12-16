<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = [
        'property_id',
        'url',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    protected $appends = ['full_url'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function getFullUrlAttribute(): string
    {
        // Se for uma URL externa, retorna direto
        if (str_starts_with($this->url, 'http')) {
            return $this->url;
        }
        
        // Se for arquivo local, usa Storage disk public
        return Storage::disk('public')->url($this->url);
    }
}
