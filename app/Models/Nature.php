<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class Nature extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = ['code', 'description', 'active'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
        'active' => 'boolean'
    ];

    public function occurrences(): HasMany
    {
        return $this->hasMany(Occurrence::class, 'nature_id');
    }

    public function trees(): HasMany
    {
        return $this->hasMany(Tree::class, 'nature_id');
    }

    public function tree(): Model|HasMany
    {
        return $this->hasMany(Tree::class, 'nature_id')
            ->where('active', true)
            ->first();
    }

    public function tags(): HasMany
    {
        return $this->hasMany(NatureTag::class, 'nature_id');
    }
}
