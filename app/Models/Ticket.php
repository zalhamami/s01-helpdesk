<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function technician_id()
    {
        return $this->belongsTo(User::class);
    }
    
    public function helpdesk_id()
    {
        return $this->belongsTo(User::class);
    }

    public function actions()
    {
        return $this->hasMany(TicketAction::class);
    }
}
