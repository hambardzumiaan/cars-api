<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarCardRequest;
use App\Http\Requests\CarCardUpdateRequest;
use App\Http\Requests\CarDeleteImageRequest;
use App\Http\Services\CarCardService;
use App\Http\Transformers\Cars\CarCardShowTransformer;
use App\Http\Transformers\Cars\CarCardTransformer;
use App\Models\CarAfterRenovationPhoto;
use App\Models\CarBeforeRenovationPhoto;
use App\Models\CarCard;
use App\Models\CarGeneralPhoto;
use App\Models\CarMark;
use Dflydev\DotAccessData\Data;
use http\Env\Request;
use Illuminate\Support\Facades\Log;

class CarCardController extends BaseController
{
    public $carCardService;
    public function __construct(CarCardService $carCardService)
    {
        $this->carCardService = $carCardService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarCardController:index----');
            $cards = $this->carCardService->getAll();
            Log::info('----End CarCardController:index----');

            return $this->collection($cards, new CarCardTransformer());
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
    public function store(CarCardRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarCardController:store----');
            $card = $this->carCardService->store($data);


            if(isset($data['view_360'])) {
                $this->carCardService->uploadView360($card, $data['view_360']);
            }
            Log::info('General Photo------');
            if (isset($data['general_photos'])) {
                $this->carCardService->uploadGeneralPhotos(CarGeneralPhoto::class, $data['general_photos'], $card->id, 'general');
            }

            if (isset($data['after_renovation_photos'])) {
                $this->carCardService->uploadGeneralPhotos(CarAfterRenovationPhoto::class, $data['after_renovation_photos'], $card->id, 'afterRenovation');
            }

            if (isset($data['before_renovation_photos'])) {
                $this->carCardService->uploadGeneralPhotos(CarBeforeRenovationPhoto::class, $data['before_renovation_photos'], $card->id, 'beforeRenovation');
            }

            Log::info('----End CarCardController:store----');

            return $this->item($card, new CarCardTransformer());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            Log::info('----Start CarCardController:show----');
            $card = CarCard::find($id);
            Log::info('----Start CarCardController:show----');

            return $this->item($card, new CarCardShowTransformer());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarCardUpdateRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('$request->file' . json_encode($data));
            Log::info('----Start CarCardController:update----');
            $card = $this->carCardService->update($data, $id);


            if(isset($data['view_360'])) {
                $this->carCardService->uploadView360($card, $data['view_360']);
            }

            if (isset($data['general_photos'])) {
                $this->carCardService->uploadGeneralPhotos(CarGeneralPhoto::class, $data['general_photos'], $card->id, 'general');
            }

            if (isset($data['after_renovation_photos'])) {
                $this->carCardService->uploadGeneralPhotos(CarAfterRenovationPhoto::class, $data['after_renovation_photos'], $card->id, 'afterRenovation');
            }

            if (isset($data['before_renovation_photos'])) {
                $this->carCardService->uploadGeneralPhotos(CarBeforeRenovationPhoto::class, $data['before_renovation_photos'], $card->id, 'beforeRenovation');
            }
            Log::info('----End CarCardController:update----');

            return $this->item($card, new CarCardShowTransformer());
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
            Log::info('----Start CarCardController:destroy----');
            $this->carCardService->destroy($id);
            Log::info('----End CarCardController:destroy----');

            return response('Deleted Car Card');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param CarDeleteImageRequest $request
     * @return string|void
     */
    public function deleteImage(CarDeleteImageRequest $request, $id)
    {
        try {
            Log::info('----Start CarCardController:destroy----');
            $name = $request->input('name');
            switch ($name) {
                case 'general':
                    $this->carCardService->deletePhoto(CarGeneralPhoto::class, $id);
                    break;
                case 'before-renovation':
                    $this->carCardService->deletePhoto(CarBeforeRenovationPhoto::class, $id);
                    break;
                case 'after-renovation':
                    $this->carCardService->deletePhoto(CarAfterRenovationPhoto::class, $id);
                    break;
            }

            Log::info('----End CarCardController:deleteImage----');
            return response('Deleted Image');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
