<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarTypeRequest;
use App\Http\Services\CarTypeService;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Transformers\Cars\CarTypeTransformer;
use App\Models\CarGeneralPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarGeneralPhotoController extends BaseController
{
    public $carTypeService;
    public function __construct(CarTypeService $carTypeService)
    {
        $this->carTypeService = $carTypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarTypeController:index----');
            $carTypes = $this->carTypeService->getAll();
            Log::info('----End CarTypeController:index----');

            return $this->collection($carTypes, new CarTypeTransformer());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('files')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        $allowedfileExtension=['pdf','jpg','png'];
        $files = $request->file('files');

        foreach ($files as $file) {

            $extension = $file->getClientOriginalExtension();

            $check = in_array($extension,$allowedfileExtension);
            if($check) {
                $media = new CarGeneralPhoto();
                $media_ext = $file->getClientOriginalName();
                $media_no_ext = pathinfo($media_ext, PATHINFO_FILENAME);
                $mFiles = $media_no_ext . '-' . uniqid() . '.' . $extension;
//                $image_resize = Image::make($file->getRealPath());
//                $image_resize->resize(900, 600);
//                $image_resize->save(public_path($request->card_id .'/images/' . $mFiles));

                $image       = $file;
                $filename    = $image->getClientOriginalName();

                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300, 300);
                $image_resize->save(public_path('images' . $card .'\\'
                    .$filename));


                $media->path = $mFiles;
                $media->card_id = $request->card_id;
                $media->save();
            } else {
                return response()->json(['invalid_file_format'], 422);
            }
        }
//        try {
//            $data = $request->all();
//            Log::info('----Start CarTypeController:store----');
//            $carType = $this->carTypeService->store($data);
//            Log::info('----End CarTypeController:store----');
//
//            return $this->item($carType, new CarTypeTransformer());
//        } catch (\Exception $e) {
//            return $e->getMessage();
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Todo
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarTypeRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarTypeController:update----');
            $carType = $this->carTypeService->update($data, $id);
            Log::info('----End CarTypeController:update----');

            return $this->item($carType, new CarTypeTransformer());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Log::info('----Start CarTypeController:destroy----');
            $this->carTypeService->destroy($id);
            Log::info('----End CarTypeController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
