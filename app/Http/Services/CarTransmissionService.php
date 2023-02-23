<?php

namespace App\Http\Services;

use App\Models\CarTransmission;

class CarTransmissionService
{
    public function getAll()
    {
        return CarTransmission::all();
    }
    public function store($data)
    {
        return CarTransmission::create($data);
    }

    public function update($data, $id)
    {
        $carTransmission = CarTransmission::find($id);

        if ($carTransmission) {
            $carTransmission->update($data);

            return $carTransmission;
        } else {
            throw new \Exception('Car transmission not found');
        }
    }

    public function destroy($id)
    {
        $carTransmission = CarTransmission::find($id);

        if ($carTransmission) {
            $carTransmission->delete();
        } else {
            throw new \Exception('Car transmission not found');
        }
    }
}
