<?php

namespace Rish0593\HelpDesk\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketUser extends Model
{
    use HasFactory;

    protected $table = 'ticket_users';

    protected $fillable = [
        'name',
        'mobile',
        'email'
    ];
}
