<?php

namespace App\Http\Services;

use App\Models\CarSticker;

class CarStickerService
{
    public function getAll()
    {
        return CarSticker::all();
    }
    public function store($data)
    {
        return CarSticker::create($data);
    }

    public function update($data, $id)
    {
        $carSticker = CarSticker::find($id);

        if ($carSticker) {
            $carSticker->update($data);

            return $carSticker;
        } else {
            throw new \Exception('Car sticker not found');
        }
    }

    public function destroy($id)
    {
        $carSticker = CarSticker::find($id);

        if ($carSticker) {
            $carSticker->delete();
        } else {
            throw new \Exception('Car sticker not found');
        }
    }
}
