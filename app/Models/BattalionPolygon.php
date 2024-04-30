<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class BattalionPolygon extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['battalion_id', 'company', 'coordinates'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
        'coordinates' => 'json'
    ];

    public function battalion(): BelongsTo
    {
        return $this->belongsTo(Battalion::class, 'battalion_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
