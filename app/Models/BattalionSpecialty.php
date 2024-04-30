<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class BattalionSpecialty extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
    ];

    public function battalions(): HasMany
    {
        return $this->hasMany(Battalion::class, 'specialty_id');
    }
}
