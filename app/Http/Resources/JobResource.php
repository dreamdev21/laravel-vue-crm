<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class JobResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'account_id' => $this->account_id,
            'contact_id' => $this->contact_id,
            'company_id' => $this->company_id,
            'asset_id' => $this->asset_id,
            'type' => $this->type,
            'cost_labour' => $this->cost_labour,
            'material_labour' => $this->material_labour,
            'hours' => $this->hours,
            'status_id' => $this->status_id,
            'comment' => $this->comment,
            'description' => $this->description,
            'priority_id' => $this->priority_id,
            'inspection_id' => $this->inspection_id,
            'created_by'=>$this->created_by,
            'updated_by'=>$this->updated_by,
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
