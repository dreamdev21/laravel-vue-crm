<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SpareResource extends Resource
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
            'manufacturer_id' => $this->manufacturer_id,
            'asset_id' => $this->asset_id,
            'spare_type' => $this->spare_type,
            'name' => $this->name,
            'serial' => $this->serial,
            'cost' => $this->cost,
            'status' => $this->status,
            'minimum_stock' => $this->minimum_stock,
            'current_stock' => $this->current_stock,
            'image' => $this->image,
            'description' => $this->description,
            'comment' => $this->comment,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
