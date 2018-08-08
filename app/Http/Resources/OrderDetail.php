<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderDetail extends Resource
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
            'quantity' => $this->quantity,
            'amount' => $this->amount,
            'menu_item_id' => $this->menu_item_id,
            'order_id' => $this->order_id,
            'enabled' => $this->enabled,
            ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
