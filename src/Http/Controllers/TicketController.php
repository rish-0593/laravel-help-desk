<?php

namespace Rish0593\HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rish0593\HelpDesk\Models\Ticket;
use Illuminate\Support\Facades\Crypt;
use Rish0593\HelpDesk\Models\TicketUser;
use Rish0593\HelpDesk\Models\TicketCategory;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $user = $this->createOrUpdateUser($request);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'ticket_category_id' => Crypt::decrypt($request->category),
                'ticket_status_id' => 2,
                'ticket_user_id' => $user->id
            ];

            $ticket = Ticket::create($data);

            return $ticket;
        }

        $categories = TicketCategory::get();

        return view('helpdesk::ticket.index', compact('categories'));
    }

    public function createOrUpdateUser(Request $request)
    {
        $data = TicketUser::updateOrCreate(
            [
                'mobile' => $request->mobile
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
            ]
        );

        return $data;
    }
}
