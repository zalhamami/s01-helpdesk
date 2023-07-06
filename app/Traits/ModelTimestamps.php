<?php

namespace App\Traits;

use Carbon\Carbon;

trait ModelTimestamps
{
    public function getCreatedAtAttribute($value)
    {
        // Return in Asia/Jakarta timezone
        return Carbon::parse($value)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s');

    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s');
    }
}
