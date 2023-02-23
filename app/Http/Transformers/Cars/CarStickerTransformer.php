<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarSeat;
use App\Models\CarSticker;
use League\Fractal\TransformerAbstract;

class CarStickerTransformer extends TransformerAbstract
{
    public function transform(CarSticker $carSticker)
    {
        return [
            'id' => $carSticker->id,
            'text' => $carSticker->text,
            'color' => $carSticker->color,
        ];
    }
}
