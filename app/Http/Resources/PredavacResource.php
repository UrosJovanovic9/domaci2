<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\PredavacController;
use App\Http\Resources\UserResource;


class PredavacResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     // Da nam pise predavac kada prikazujemo predavaca u postmanu
     public static $wrap = 'predavac';

    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'id'=>$this->resource->id,
            'imeIPrezime'=>$this->resource->imeIPrezime,
            'zvanje'=>$this->resource->zvanje,
            'fakultet'=>$this->resource->fakultet,
            'user'=>new UserResource($this->resource->user),
        ];
    }
}
