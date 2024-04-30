<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;

class Occurrence extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = ['occurrence', 'address_id', 'observe', 'finish', 'atendent', 'redirect', 'requestor', 'company', 'phone', 'nature_id', 'battalion_id', 'occurrence_alert_id', 'occurrence_alert_gravity_id', 'reiteration', 'answers', 'information', 'possible_hazing', 'patrol', 'hidden'];


    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function battalion(): BelongsTo
    {
        return $this->belongsTo(Battalion::class, 'battalion_id');
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class, 'nature_id');
    }


    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($occurrence) {
            $occurrence->occurrence = self::generateOccurrenceNumber();
        });
    }

   public static function generateOccurrenceNumber(): string
   {
       $today = Carbon::today();
       $latestOccurrence = self::whereDate('created_at', $today)->latest('occurrence')->first();

       if ($latestOccurrence) {
           $number = sprintf('%05d', (int) $latestOccurrence->occurrence + 1);
       } else {
           $number = '00001';
       }

       return $number;
   }


    public function getTimeElapsedAttribute(): string
    {
        $now = Carbon::now();
        $created = Carbon::parse($this->created_at);
        return $created->diff($now)->format('%H:%I:%S');
    }


}
