<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;

class UserBattalion extends Model
{
    use HasFactory, HasUuids;

    public const CREATED_AT = null;

    protected $fillable = ['user_id', 'battalion_id'];

    protected $casts = ['updated_at' => 'datetime:d/m/Y, H:i:s'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($userBattalion) {
            $userBattalion->user_id = Auth::id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function battalion(): BelongsTo
    {
        return $this->belongsTo(Battalion::class, 'battalion_id');
    }

}
