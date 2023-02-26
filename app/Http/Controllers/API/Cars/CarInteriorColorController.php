<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarInteriorColorRequest;
use App\Http\Services\CarInteriorColorService;
use App\Http\Transformers\Cars\CarInteriorColorTransformer;
use App\Models\CarInteriorColor;
use Illuminate\Support\Facades\Log;

class CarInteriorColorController extends BaseController
{
    public $carInteriorColorService;
    public function __construct(CarInteriorColorService $carInteriorColorService)
    {
        $this->carInteriorColorService = $carInteriorColorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarInteriorColorController:index----');
            $carInteriorColors = $this->carInteriorColorService->getAll();
            Log::info('----End CarInteriorColorController:index----');

            return $this->collection($carInteriorColors, new CarInteriorColorTransformer());
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
    public function store(CarInteriorColorRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarInteriorColorController:store----');
            $carInteriorColor = $this->carInteriorColorService->store($data);
            Log::info('----End CarInteriorColorController:store----');

            return $this->item($carInteriorColor, new CarInteriorColorTransformer());
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
            $carInteriorColor = CarInteriorColor::find($id);

            return $this->item($carInteriorColor, new CarInteriorColorTransformer());
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
    public function update(CarInteriorColorRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarInteriorColorController:update----');
            $carInteriorColor = $this->carInteriorColorService->update($data, $id);
            Log::info('----End CarInteriorColorController:update----');

            return $this->item($carInteriorColor, new CarInteriorColorTransformer());
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
            Log::info('----Start CarInteriorColorController:destroy----');
            $this->carInteriorColorService->destroy($id);
            Log::info('----End CarInteriorColorController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
