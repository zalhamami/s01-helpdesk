<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['action'];
    
    public function action()
    {
        return $this->belongsTo(ActionList::class, 'action_list_id');
    }
}
