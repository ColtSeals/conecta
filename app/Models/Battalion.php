<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Battalion extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = ['specialty_id', 'name', 'phone', 'description', 'police_command', 'address_id'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
    ];

    public function occurrences(): HasMany
    {
        return $this->hasMany(Occurrence::class, 'battalion_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function specialty(): BelongsTo
    {
        return $this->belongsTo(BattalionSpecialty::class, 'specialty_id');
    }

    public function polygons(): HasMany
    {
        return $this->hasMany(BattalionPolygon::class, 'battalion_id');
    }
}
