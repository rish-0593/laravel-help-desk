<?php

namespace Rish0593\HelpDesk\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rish0593\HelpDesk\Models\Ticket;
use Rish0593\HelpDesk\Actions\Datatable;
use Rish0593\HelpDesk\Http\Resources\Admin\TicketResource;

class TicketController extends Controller
{
    public function getQuery(Request $request)
    {
        return Ticket::query()->with(['category', 'status', 'user']);
    }

    public function datatable(Request $request)
    {
        $list = (new Datatable($request))->setQuery(function () use ($request) {
            return $this->getQuery($request);
        })->setFilterQuery(function($q) use ($request) {
            return $q;
        })->process(function($q, $skip, $take){
            return TicketResource::collection(
                $q->orderByDesc('id')->skip($skip)->take($take)->get()
            );
        });

        return $list;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->datatable($request);
        }

        return view('helpdesk::admin.tickets.index');
    }
}
