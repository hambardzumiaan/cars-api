<?php

namespace App\Http\Services;

use App\Models\CarFuelType;
use App\Models\CarType;

class CarFuelTypeService
{
    public function getAll()
    {
        return CarFuelType::all();
    }

    public function store($data)
    {
        return CarFuelType::create($data);
    }

    public function update($data, $id)
    {
        $carFuelType = CarFuelType::find($id);

        if ($carFuelType) {
            $carFuelType->update($data);

            return $carFuelType;
        } else {
            throw new \Exception('Car Fuel type not found');
        }
    }

    public function destroy($id)
    {
        $carFuelType = CarFuelType::find($id);

        if ($carFuelType) {
            $carFuelType->delete();
        } else {
            throw new \Exception('Car Fuel type not found');
        }
    }
}
