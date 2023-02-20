<?php

namespace App\Http\Services;

use App\Models\CarYear;

class CarYearService
{
    public function getAll()
    {
        return CarYear::all();
    }
    public function store($data)
    {
        return CarYear::create($data);
    }

    public function update($data, $id)
    {
        $carYear = CarYear::find($id);

        if ($carYear) {
            $carYear->update($data);

            return $carYear;
        } else {
            throw new \Exception('Car Year not found');
        }
    }

    public function destroy($id)
    {
        $carYear = CarYear::find($id);

        if ($carYear) {
            $carYear->delete();
        } else {
            throw new \Exception('Car Year not found');
        }
    }
}
