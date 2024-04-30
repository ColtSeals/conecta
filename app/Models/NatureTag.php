<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class NatureTag extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = ['nature_id', 'tag'];

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class, 'nature_id');
    }
}
