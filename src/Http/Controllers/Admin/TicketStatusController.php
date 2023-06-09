<?php

namespace Rish0593\HelpDesk\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Rish0593\HelpDesk\Actions\Datatable;
use Rish0593\HelpDesk\Models\TicketStatus;
use Rish0593\HelpDesk\Http\Resources\Admin\TicketStatusResource;

class TicketStatusController extends Controller
{
    public function getQuery(Request $request)
    {
        return TicketStatus::query();
    }

    public function datatable(Request $request)
    {
        $list = (new Datatable($request))->setQuery(function () use ($request) {
            return $this->getQuery($request);
        })->setFilterQuery(function($q) use ($request) {
            return $q;
        })->process(function($q, $skip, $take){
            return TicketStatusResource::collection(
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

        return view('helpdesk::admin.tickets.status.index');
    }

    public function addOrUpdate(Request $request)
    {
        $data = TicketStatus::updateOrCreate(
            [
                'id' => $request->id ?? null,
            ],
            [
                'name' => $request->name
            ]
        );

        return $data;
    }

    public function trash(Request $request)
    {
        TicketStatus::destroy($request->id);

        return true;
    }

    public function updateStatus(Request $request)
    {
        TicketStatus::find($request->id)->update([
            'status' => DB::raw('NOT status')
        ]);

        return true;
    }
}
