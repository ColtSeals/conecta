<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class Question extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = ['tree_id', 'name', 'type'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
    ];

    public function tree(): BelongsTo
    {
        return $this->belongsTo(Tree::class, 'tree_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id');
    }

    public function answer()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id')->first();
    }
}
