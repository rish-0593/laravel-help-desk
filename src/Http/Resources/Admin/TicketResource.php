<?php

namespace Rish0593\HelpDesk\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'ticket_category' => $this->category->name ?? '',
            'ticket_status' => $this->status->name ?? '',
            'ticket_user' => $this->user ?? '',
        ];

        return $data;
    }
}
