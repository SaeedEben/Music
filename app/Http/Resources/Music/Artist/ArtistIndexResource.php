<?php

namespace App\Http\Resources\Music\Artist;

use App\Models\Music\Artist;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class ArtistIndexResource
 *
 * @package App\Http\Resources\Music\Artist
 *
 * @mixin Artist
 */
class ArtistIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'      => $this->name,
            'biography' => $this->biography
        ];
    }
}
