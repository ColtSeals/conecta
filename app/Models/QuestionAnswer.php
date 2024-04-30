<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class QuestionAnswer extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'question_id',
        'question_answer_id',
        'name',
        'answer',
        'occurrence_alert_id',
        'occurrence_alert_gravity_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function answerTo(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_answer_id');
    }

    public function alert(): BelongsTo
    {
        return $this->belongsTo(OccurrenceAlert::class, 'occurrence_alert_id');
    }

    public function gravity(): BelongsTo
    {
        return $this->belongsTo(OccurrenceAlert::class, 'occurrence_gravity_id');
    }
}
