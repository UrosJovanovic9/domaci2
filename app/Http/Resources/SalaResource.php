<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'sala';
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            'id'=>$this->resource->id,
            'naziv'=>$this->resource->naziv,
            'sprat'=>$this->resource->sprat,
        ];
    }
}
