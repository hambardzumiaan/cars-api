<?php

namespace App\Http\Services;

use App\Models\CarSeat;

class CarSeatService
{
    public function getAll()
    {
        return CarSeat::all();
    }
    public function store($data)
    {
        return CarSeat::create($data);
    }

    public function update($data, $id)
    {
        $carSeat = CarSeat::find($id);

        if ($carSeat) {
            $carSeat->update($data);

            return $carSeat;
        } else {
            throw new \Exception('Car seat not found');
        }
    }

    public function destroy($id)
    {
        $carSeat = CarSeat::find($id);

        if ($carSeat) {
            $carSeat->delete();
        } else {
            throw new \Exception('Car seat not found');
        }
    }
}
