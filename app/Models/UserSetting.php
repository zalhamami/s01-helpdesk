<?php

namespace App\Models;

use App\Traits\ModelTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory, ModelTimestamps;

    protected $guarded = ['id'];
}
