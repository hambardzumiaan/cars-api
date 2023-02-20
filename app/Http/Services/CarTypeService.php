<?php

namespace App\Http\Services;

use App\Models\CarType;

class CarTypeService
{
    public function getAll()
    {
        return CarType::all();
    }
    public function store($data)
    {
        return CarType::create($data);
    }

    public function update($data, $id)
    {
        $carType = CarType::find($id);

        if ($carType) {
            $carType->update($data);

            return $carType;
        } else {
            throw new \Exception('Car type not found');
        }
    }

    public function destroy($id)
    {
        $carType = CarType::find($id);

        if ($carType) {
            $carType->delete();
        } else {
            throw new \Exception('Car type not found');
        }
    }
}
