<?php

namespace Rish0593\HelpDesk\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Rish0593\HelpDesk\Actions\Datatable;
use Rish0593\HelpDesk\Models\TicketCategory;
use Rish0593\HelpDesk\Http\Resources\Admin\TicketCategoryResource;

class TicketCategoryController extends Controller
{
    public function getQuery(Request $request)
    {
        return TicketCategory::query();
    }

    public function datatable(Request $request)
    {
        $list = (new Datatable($request))->setQuery(function () use ($request) {
            return $this->getQuery($request);
        })->setFilterQuery(function($q) use ($request) {
            return $q;
        })->process(function($q, $skip, $take){
            return TicketCategoryResource::collection(
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

        return view('helpdesk::admin.tickets.categories.index');
    }

    public function addOrUpdate(Request $request)
    {
        $data = TicketCategory::updateOrCreate(
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
        TicketCategory::destroy($request->id);

        return true;
    }

    public function updateStatus(Request $request)
    {
        TicketCategory::find($request->id)->update([
            'status' => DB::raw('NOT status')
        ]);

        return true;
    }
}
