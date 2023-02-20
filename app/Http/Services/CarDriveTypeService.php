<?php

namespace App\Http\Services;

use App\Models\CarDriveType;
use App\Models\CarType;

class CarDriveTypeService
{
    public function getAll()
    {
        return CarDriveType::all();
    }

    public function store($data)
    {
        return CarDriveType::create($data);
    }

    public function update($data, $id)
    {
        $carDriveType = CarDriveType::find($id);

        if ($carDriveType) {
            $carDriveType->update($data);

            return $carDriveType;
        } else {
            throw new \Exception('Car drive type not found');
        }
    }

    public function destroy($id)
    {
        $carDriveType = CarDriveType::find($id);

        if ($carDriveType) {
            $carDriveType->delete();
        } else {
            throw new \Exception('Car drive type not found');
        }
    }
}
