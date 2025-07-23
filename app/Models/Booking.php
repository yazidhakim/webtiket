<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'booking_trx_id',
        'phone_number',
        'email',
        'proof',
        'total_amount',
        'total_participant',
        'is_paid',
        'started_at',
        'ticket_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function generateUniqueTrxId()
    {
        $prefix = 'JRT';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    protected $casts = [
    'started_at' => 'datetime',
    ];

}
