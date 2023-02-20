<?php

namespace App\Http\Services;

use App\Models\CarBodyStyle;

class CarBodyStyleService
{
    public function getAll()
    {
        return CarBodyStyle::all();
    }
    public function store($data)
    {
        return CarBodyStyle::create($data);
    }

    public function update($data, $id)
    {
        $carType = CarBodyStyle::find($id);

        if ($carType) {
            $carType->update($data);

            return $carType;
        } else {
            throw new \Exception('Car body style not found');
        }
    }

    public function destroy($id)
    {
        $carType = CarBodyStyle::find($id);

        if ($carType) {
            $carType->delete();
        } else {
            throw new \Exception('Car body not found');
        }
    }
}
