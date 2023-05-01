<?php

namespace Rish0593\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ticket_categories';

    protected $fillable = [
        'name',
        'status'
    ];
}
