<?php

namespace App\Http\Services;

use App\Models\CarInteriorColor;
use Illuminate\Support\Facades\Log;

class CarInteriorColorService
{
    public function getAll()
    {
        return CarInteriorColor::all();
    }

    public function store($data)
    {
        return CarInteriorColor::create($data);
    }

    public function update($data, $id)
    {
        $carInteriorColor = CarInteriorColor::find($id);

        if ($carInteriorColor) {
            $carInteriorColor->update($data);

            return $carInteriorColor;
        } else {
            throw new \Exception('Car interior color not found');
        }
    }

    public function destroy($id)
    {
        $carInteriorColor = CarInteriorColor::find($id);

        if ($carInteriorColor) {
            $carInteriorColor->delete();
        } else {
            throw new \Exception('Car interior color not found');
        }
    }
}
