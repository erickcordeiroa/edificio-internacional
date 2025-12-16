<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'responsible_person',
        'contact',
        'whatsapp_contact',
        'type',
        'price',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title);
            }
        });

        static::updating(function ($property) {
            if ($property->isDirty('title') && !$property->isDirty('slug')) {
                $property->slug = Str::slug($property->title);
            }
        });
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function getFeaturedPhotoAttribute()
    {
        return $this->photos()->where('is_featured', true)->first() 
            ?? $this->photos()->first();
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    public function getTypeNameAttribute(): string
    {
        return match($this->type) {
            'SALE' => 'Venda',
            'RENT' => 'Aluguel',
            default => $this->type,
        };
    }

    public function getWhatsappLinkAttribute(): ?string
    {
        if (!$this->whatsapp_contact) {
            return null;
        }
        
        $phone = preg_replace('/[^0-9]/', '', $this->whatsapp_contact);
        return "https://wa.me/55{$phone}?text=Olá! Tenho interesse no imóvel: {$this->title}";
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeForSale($query)
    {
        return $query->where('type', 'SALE');
    }

    public function scopeForRent($query)
    {
        return $query->where('type', 'RENT');
    }
}
