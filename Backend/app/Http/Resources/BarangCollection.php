<?php

namespace App\Http\Resources;
use App\Barang as Barang;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BarangCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Barang $barang) {
            return (new BarangResource($barang));
        });
        return parent::toArray($request);
    }
}
