<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AssetResource extends Resource
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
            'company_id' => $this->company_id,
            'name' => $this->name,
            'asset_type' => $this->asset_type,
            'agent_id' => $this->agent_id,
            'serial' => $this->serial,
            'bmb' => $this->bmb,
            'location' => $this->location,
            'status' => $this->status,
            'description' => $this->description,
            'comment' => $this->comment,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
