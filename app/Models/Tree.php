<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class Tree extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'user_creator_id',
        'user_publisher_id',
        'nature_id',
        'name',
        'active'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
        'active' => 'boolean'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($tree) {
            $tree->user_creator_id = Auth::id();
            $tree->user_publisher_id = Auth::id();
        });

        static::updated(fn ($tree) => $tree->user_publisher_id = Auth::id());
    }

    public function userCreator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_creator_id');
    }

    public function userPublisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_publisher_id');
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class, 'nature_id');
    }


    public function question()
    {
        return $this->hasMany(Question::class, 'tree_id')->first();
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'tree_id');
    }
}
