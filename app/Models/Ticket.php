<?php

namespace App\Models;

use App\Traits\ModelTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, ModelTimestamps;
    
    protected $guarded = ['id'];
    
    protected $with = ['technician', 'helpdesk', 'actions'];

    public function technician()
    {
        return $this->belongsTo(User::class);
    }
    
    public function helpdesk()
    {
        return $this->belongsTo(User::class);
    }

    public function actions()
    {
        return $this->hasMany(TicketAction::class);
    }
}
