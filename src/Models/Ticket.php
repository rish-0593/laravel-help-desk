<?php

namespace Rish0593\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tickets';

    protected $fillable = [
        'title',
        'description',
        'ticket_category_id',
        'ticket_status_id',
        'ticket_user_id'
    ];

    public function category()
    {
        return $this->hasOne(TicketCategory::class, 'id', 'ticket_category_id');
    }

    public function status()
    {
        return $this->hasOne(TicketStatus::class, 'id', 'ticket_status_id');
    }

    public function user()
    {
        return $this->hasOne(TicketUser::class, 'id', 'ticket_user_id');
    }
}
