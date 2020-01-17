<?php
namespace App\Http\Resources;

use App\Pemesanan as Pesan;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Pemesanan extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
            $this->collection->transform(function (Pesan $pesan) {
                return (new PemesananResource($pesan));
            });
            return parent::toArray($request);

    }
}
