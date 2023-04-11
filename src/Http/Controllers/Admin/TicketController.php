<?php

namespace Rish0593\HelpDesk\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        return view('HelpDesk::admin.tickets.index');
    }

    public function list(Request $request)
    {
        //
    }
}
