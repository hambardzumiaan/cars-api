<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarStickerRequest;
use App\Http\Services\CarStickerService;
use App\Http\Transformers\Cars\CarStickerTransformer;
use App\Models\CarSticker;
use Illuminate\Support\Facades\Log;

class CarStickerController extends BaseController
{
    public $carStickerService;
    public function __construct(CarStickerService $carStickerService)
    {
        $this->carStickerService = $carStickerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarStickerController:index----');
            $carStickers = $this->carStickerService->getAll();
            Log::info('----End CarStickerController:index----');

            return $this->collection($carStickers, new CarStickerTransformer());
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
    public function store(CarStickerRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarStickerController:store----');
            $carType = $this->carStickerService->store($data);
            Log::info('----End CarStickerController:store----');

            return $this->item($carType, new CarStickerTransformer());
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
            $carSticker = CarSticker::find($id);

            return $this->item($carSticker, new CarStickerTransformer());
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
    public function update(CarStickerRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarStickerController:update----');
            $carSticker = $this->carStickerService->update($data, $id);
            Log::info('----End CarStickerController:update----');

            return $this->item($carSticker, new CarStickerTransformer());
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
            Log::info('----Start CarStickerController:destroy----');
            $this->carStickerService->destroy($id);
            Log::info('----End CarStickerController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
