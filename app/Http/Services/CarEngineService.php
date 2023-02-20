<?php

namespace App\Http\Services;

use App\Models\CarEngine;

class CarEngineService
{
    public function getAll()
    {
        return CarEngine::all();
    }

    public function store($data)
    {
        return CarEngine::create($data);
    }

    public function update($data, $id)
    {
        $carEngine = CarEngine::find($id);

        if ($carEngine) {
            $carEngine->update($data);

            return $carEngine;
        } else {
            throw new \Exception('Car engine not found');
        }
    }

    public function destroy($id)
    {
        $carEngine = CarEngine::find($id);

        if ($carEngine) {
            $carEngine->delete();
        } else {
            throw new \Exception('Car engine not found');
        }
    }
}
