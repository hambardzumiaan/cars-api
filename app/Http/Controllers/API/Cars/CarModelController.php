<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarModelRequest;
use App\Http\Services\CarModelService;
use App\Http\Transformers\Cars\CarModelTransformer;
use App\Models\CarModel;
use Illuminate\Support\Facades\Log;

class CarModelController extends BaseController
{
    public $carModelService;
    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService = $carModelService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarModelController:index----');
            $carModels = $this->carModelService->getAll();
            Log::info('----End CarModelController:index----');

            return $this->collection($carModels, new CarModelTransformer());
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
    public function store(CarModelRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarModelController:store----');
            $carModel = $this->carModelService->store($data);
            Log::info('----End CarModelController:store----');

            return $this->item($carModel, new CarModelTransformer());
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
            $model = CarModel::find($id);

            return $this->item($model, new CarModelTransformer());
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
    public function update(CarModelRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarModelController:update----');
            $carModel = $this->carModelService->update($data, $id);
            Log::info('----End CarModelController:update----');

            return $this->item($carModel, new CarModelTransformer());
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
            Log::info('----Start CarModelController:destroy----');
            $this->carModelService->destroy($id);
            Log::info('----End CarModelController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
