<?php

namespace App\Http\Services;

use App\Models\CarMark;

class CarMarkService
{
    public function getAll()
    {
        return CarMark::all();
    }
    public function store($data)
    {
        return CarMark::create($data);
    }

    public function update($data, $id)
    {
        $carType = CarMark::find($id);

        if ($carType) {
            $carType->update($data);

            return $carType;
        } else {
            throw new \Exception('Car mark not found');
        }
    }

    public function destroy($id)
    {
        $carType = CarMark::find($id);

        if ($carType) {
            $carType->delete();
        } else {
            throw new \Exception('Car mark not found');
        }
    }
}
