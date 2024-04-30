<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class Address extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'street',
        'number',
        'city',
        'state',
        'latitude',
        'longitude',
        'postal_code',
        'plusCode',
        'neighborhood',
        'reference',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
    ];

    public function occurrences(): HasMany
    {
        return $this->hasMany(Occurrence::class, 'address_id');
    }

    public function battalions(): HasMany
    {
        return $this->hasMany(Battalion::class, 'address_id');
    }
}
