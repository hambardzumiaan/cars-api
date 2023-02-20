<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarMark;
use App\Models\CarModel;
use League\Fractal\TransformerAbstract;

class CarModelTransformer extends TransformerAbstract
{
    public function transform(CarModel $carModel)
    {
        return [
            'id' => $carModel->id,
            'name' => $carModel->name,
            'mark' => $carModel->carMark,
        ];
    }
}
