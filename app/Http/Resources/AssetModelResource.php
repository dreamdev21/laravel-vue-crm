<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AssetModelResource extends Resource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'account_id' => $this->account_id,
            'name' => $this->name,
            'type' => $this->type,
            'rent' => $this->rent,
            'frequency' => $this->frequency,
            'minimum_stock' => $this->minimum_stock,
            'current_stock' => $this->current_stock,
            'image' => $this->image,
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
