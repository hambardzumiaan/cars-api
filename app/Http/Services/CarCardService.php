<?php

namespace App\Http\Services;

use App\Models\CarAfterRenovationPhoto;
use App\Models\CarBeforeRenovationPhoto;
use App\Models\CarCard;
use App\Models\CarGeneralPhoto;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;
use function GuzzleHttp\json_decode;

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

        if (isset($data["general_photos_ids"])) {
            foreach (json_decode($data["general_photos_ids"], true) as $photoItem) {
                $photo = CarGeneralPhoto::find($photoItem["id"]);

                if(isset($photo)) {
                    $photo->row_index = $photoItem["row_index"];
                    $photo->active = $photoItem["active"];
                    $photo->save();
                }
            }
        }

        if (isset($data["after_renovation_photos_ids"])) {
            foreach (json_decode($data["after_renovation_photos_ids"], true) as $photoItem) {
                $photo = CarAfterRenovationPhoto::find($photoItem["id"]);

                if(isset($photo)) {
                    $photo->row_index = $photoItem["row_index"];
                    $photo->active = $photoItem["active"];
                    $photo->save();
                }
            }
        }

        if (isset($data["before_renovation_photos_ids"])) {
            foreach (json_decode($data["before_renovation_photos_ids"], true) as $photoItem) {
                $photo = CarBeforeRenovationPhoto::find($photoItem["id"]);

                if(isset($photo)) {
                    $photo->row_index = $photoItem["row_index"];
                    $photo->active = $photoItem["active"];
                    $photo->save();
                }
            }
        }

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
            if (File::exists('images/' . $card->id)) {
                File::deleteDirectory(public_path('images/' . $card->id));
            }
            $card->generalPhotos()->delete();
            $card->beforeRenovationPhotos()->delete();
            $card->afterRenovationPhotos()->delete();
            $card->delete();
        } else {
            throw new \Exception('Car card not found');
        }
    }

    public function uploadGeneralPhotos($model, $files, $cardId, $folderName)
    {
        $allowedfileExtension=['pdf','jpg','png'];

        foreach ($files as $file) {
            $model = new $model;
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension,$allowedfileExtension);
            if($check) {
                $media_ext = $file->getClientOriginalName();
                $media_no_ext = pathinfo($media_ext, PATHINFO_FILENAME);
                $filename = $media_no_ext . '-' . uniqid() . '.' . $extension;

                $path = 'images/' . $cardId . '/' . $folderName;
                if(!File::exists($path)) {
                    File::makeDirectory($path, 0755, true);
                }
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(900, 600);
                $imageFullPath = 'images/' . $cardId .'/' . $folderName . '/' .$filename;
                $image_resize->save(public_path($imageFullPath));
                $model->path = $imageFullPath;
                $model->car_card_id = $cardId;
                $model->active = 0;
                $model->row_index = count($model->get());
                $model->save();
            } else {
                return response()->json(['invalid_file_format'], 422);
            }
        }
    }

    public function deletePhoto($model, $id)
    {
        $model = new $model;
        $photo = $model->find($id);

        if (!$photo) {
            throw new \Exception('Car card not found');
        }

        File::delete($photo->path);
        $photo->delete();
    }

    public function uploadView360($card, $file)
    {
        $allowedfileExtension=['pdf','jpg','png'];
        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension,$allowedfileExtension);
        if($check) {
            $media_ext = $file->getClientOriginalName();
            $media_no_ext = pathinfo($media_ext, PATHINFO_FILENAME);
            $filename = $media_no_ext . '-' . uniqid() . '.' . $extension;

            $path = 'images/' . $card->id . '/view360';
            if(!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            } else if (File::exists('images/' . $card->id)) {
                File::deleteDirectory(public_path('images/' . $card->id));
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(900, 600);
            $imageFullPath = 'images/' . $card->id .'/view360' . '/' .$filename;
            $image_resize->save(public_path($imageFullPath));
            $card->view_360 = $imageFullPath;
            $card->save();
        } else {
            return response()->json(['invalid_file_format'], 422);
        }
    }
}
