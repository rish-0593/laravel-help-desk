<?php

namespace Rish0593\HelpDesk\Actions;

use Illuminate\Http\Request;

class Datatable {
    public const RECORD_LENGTH = 50;

    protected $dQuery;
    protected $dFQuery;

    protected $dDraw;
    protected $dSkip;
    protected $dTake;

    protected $recordsTotal;
    protected $recordsFiltered;

    public function __construct(Request $request)
    {
        $this->dDraw = intval($request->draw) ?? 1;
        $this->dSkip = $request->start ?? 0;
        $this->dTake = $request->length ?? Datatable::RECORD_LENGTH;
    }

    public function setQuery($callback)
    {
        $this->dQuery = call_user_func($callback);
        $this->recordsTotal = $this->dQuery->count();

        return $this;
    }

    public function setFilterQuery($callback)
    {
        $this->dFQuery = call_user_func($callback, $this->dQuery);
        $this->recordsFiltered = $this->dFQuery->count();

        return $this;
    }

    public function process($callback)
    {
        $result = call_user_func($callback, $this->dQuery, $this->dSkip, $this->dTake);

        return [
            'status' => 1,
            'draw' => $this->dDraw,
            'recordsTotal' => $this->recordsTotal,
            'recordsFiltered' => $this->recordsFiltered,
            'data' => $result,
        ];
    }
}
