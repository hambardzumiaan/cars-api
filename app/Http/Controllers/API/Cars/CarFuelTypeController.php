<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarTypeRequest;
use App\Http\Services\CarFuelTypeService;
use App\Http\Transformers\Cars\CarFuelTypeTransformer;
use App\Models\CarFuelType;
use Illuminate\Support\Facades\Log;

class CarFuelTypeController extends BaseController
{
    public $carFuelTypeService;
    public function __construct(CarFuelTypeService $carFuelTypeService)
    {
        $this->carFuelTypeService = $carFuelTypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarFuelTypeController:index----');
            $carFuelTypes = $this->carFuelTypeService->getAll();
            Log::info('----End CarFuelTypeController:index----');

            return $this->collection($carFuelTypes, new CarFuelTypeTransformer());
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
    public function store(CarTypeRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarFuelTypeController:store----');
            $carFuelType = $this->carFuelTypeService->store($data);
            Log::info('----End CarFuelTypeController:store----');

            return $this->item($carFuelType, new CarFuelTypeTransformer());
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
            $fuelType = CarFuelType::find($id);

            return $this->item($fuelType, new CarFuelTypeTransformer());
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
    public function update(CarTypeRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarFuelTypeController:update----');
            $carFuelType = $this->carFuelTypeService->update($data, $id);
            Log::info('----End CarFuelTypeController:update----');

            return $this->item($carFuelType, new CarFuelTypeTransformer());
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
            Log::info('----Start CarFuelTypeController:destroy----');
            $this->carFuelTypeService->destroy($id);
            Log::info('----End CarFuelTypeController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
