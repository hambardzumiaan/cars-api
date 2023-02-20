<?php

namespace App\Http\Services;

use App\Models\CarExteriorColor;

class CarExteriorColorService
{
    public function getAll()
    {
        return CarExteriorColor::all();
    }

    public function store($data)
    {
        return CarExteriorColor::create($data);
    }

    public function update($data, $id)
    {
        $carExteriorColor = CarExteriorColor::find($id);

        if ($carExteriorColor) {
            $carExteriorColor->update($data);

            return $carExteriorColor;
        } else {
            throw new \Exception('Car exterior color not found');
        }
    }

    public function destroy($id)
    {
        $carExteriorColor = CarExteriorColor::find($id);

        if ($carExteriorColor) {
            $carExteriorColor->delete();
        } else {
            throw new \Exception('Car interior color not found');
        }
    }
}
