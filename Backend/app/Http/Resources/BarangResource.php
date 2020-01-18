<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'nama_barang'       => $this->nama_barang,
            'harga_barang'      => $this->harga_barang,
            'stok_barang'       => $this->stok_barang,
            'item_image'        => $this->item_image,
            'global'            => $this->global,
            'wilayah_produk'    => $this->wilayah->transform(function($w){
                return[
                    'id_wilayah'    => $w->id,
                    'nama'          => $w->name,
                ];
            }),
            
        ];    
    }
}
