<?php

namespace App\Http\Services;

use App\Models\CarCard;
use App\Models\CarGeneralPhoto;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class CarCardService
{
    public function getAll()
    {
        return CarCard::all();
    }
    public function store($data)
    {
        return CarCard::create($data);
    }

    public function update($data, $id)
    {
        $card = CarCard::find($id);

        if ($card) {
            $card->update($data);

            return $card;
        } else {
            throw new \Exception('Car card not found');
        }
    }

    public function destroy($id)
    {
        $card = CarCard::find($id);

        if ($card) {
            $card->delete();
        } else {
            throw new \Exception('Car card not found');
        }
    }

    public function uploadGeneralPhotos($files, $cardId)
    {
        $allowedfileExtension=['pdf','jpg','png'];

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension,$allowedfileExtension);
            if($check) {
                $media = new CarGeneralPhoto();
                $media_ext = $file->getClientOriginalName();
                $media_no_ext = pathinfo($media_ext, PATHINFO_FILENAME);
                $filename = $media_no_ext . '-' . uniqid() . '.' . $extension;

                $path = 'images/' . $cardId;
                if(!File::exists($path)) {
                    File::makeDirectory($path, 0755, true);
                }
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(900, 600);
                $imageFullPath = 'images/' . $cardId .'/' .$filename;
                $image_resize->save(public_path($imageFullPath));


                $media->path = $imageFullPath;
                $media->car_card_id = $cardId;
                $media->save();
            } else {
                return response()->json(['invalid_file_format'], 422);
            }
        }
    }
}
