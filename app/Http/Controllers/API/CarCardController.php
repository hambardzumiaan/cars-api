<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarCardRequest;
use App\Http\Services\CarCardService;
use App\Http\Transformers\Cars\CarCardTransformer;
use App\Models\CarMark;
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

            Log::info('General Photo------');
            if (isset($data['general_photos'])) {
                $this->carCardService->uploadGeneralPhotos($request->general_photos, $card->id);
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
            $card = CarMark::find($id);

            return $this->item($card, new CarCardTransformer());
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
    public function update(CarCardRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarCardController:update----');
            $card = $this->carCardService->update($data, $id);
            Log::info('----End CarCardController:update----');

            return $this->item($card, new CarCardTransformer());
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

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
