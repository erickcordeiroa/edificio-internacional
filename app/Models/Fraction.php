<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fraction extends Model
{
    protected $fillable = [
        'location',
        'fraction',
        'type',
    ];

    protected $casts = [
        'fraction' => 'decimal:6',
    ];

    /**
     * Get fraction as percentage
     */
    public function getPercentageAttribute(): float
    {
        return (float) $this->fraction * 100;
    }

    /**
     * Get formatted percentage
     */
    public function getFormattedPercentageAttribute(): string
    {
        return number_format($this->percentage, 4, ',', '.') . '%';
    }

    /**
     * Get type label
     */
    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'apartment' => 'Apartamento',
            'store' => 'Loja',
            'garage' => 'Garagem',
            'office' => 'Sala Comercial',
            'storage' => 'Depósito',
            default => $this->type,
        };
    }

    /**
     * Calculate value based on total condominium value
     */
    public function calculateValue(float $totalValue): float
    {
        return $totalValue * (float) $this->fraction;
    }

    /**
     * Get formatted calculated value
     */
    public function getFormattedValue(float $totalValue): string
    {
        $value = $this->calculateValue($totalValue);
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    /**
     * Scope by type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get total fraction sum (should be close to 1.0 for 100%)
     */
    public static function getTotalFraction(): float
    {
        return (float) static::sum('fraction');
    }
}

