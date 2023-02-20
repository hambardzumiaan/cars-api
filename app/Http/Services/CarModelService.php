<?php

namespace App\Http\Services;

use App\Models\CarModel;

class CarModelService
{
    public function getAll()
    {
        return CarModel::all();
    }
    public function store($data)
    {
        return CarModel::create($data);
    }

    public function update($data, $id)
    {
        $carModel = CarModel::find($id);

        if ($carModel) {
            $carModel->update($data);

            return $carModel;
        } else {
            throw new \Exception('Car model not found');
        }
    }

    public function destroy($id)
    {
        $carModel = CarModel::find($id);

        if ($carModel) {
            $carModel->delete();
        } else {
            throw new \Exception('Car model not found');
        }
    }
}
