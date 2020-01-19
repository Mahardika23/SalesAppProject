<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemesananResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'                        => $this->id,
            'total_harga'               => $this->total_harga,
            'kuantitas_pesanan'         => $this->kuantitas_pesanan,
            'sales_id'                  => $this->sales_id,

            'distributor'               => [
              'id'                      => $this->distributor->id,
              'nama_distributor'        =>  $this->distributor->nama_distributor
            ]
            ,
            'barang'      => $this->barang->transform(function($b){
                return [
                    'id'                => $b->id,
                    'stok_barang'       => $b->stok_barang,
                    'nama_barang'       => $b->nama_barang,
                    'kuantitas_barang'  => $b->pivot->kuantitas_barang,
                    'item_image'        => $b->item_image,
                    'harga_barang'      => $b->pivot->harga_barang,
                    
                ];
            }),
            'status_pemesanan' => $this->status_pemesanan,
        ];
    }
}
