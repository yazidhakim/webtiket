<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public function createBooking(array $data)
    {
        return Booking::create($data);
    }
    public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
    {
        return Booking::where('booking_trx_id', $bookingTrxId)
                        ->where('phone_number', $phoneNumber)
                        ->first();
    }
}
