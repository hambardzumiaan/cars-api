<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\Product;
use App\Http\Controllers\API\ProductResource;
use App\Http\Controllers\API\Validator;
use App\Http\Requests\CarTypeRequest;
use App\Http\Services\CarTypeService;
use App\Http\Transformers\Cars\CarTypeTransformer;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarTypeController extends BaseController
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
    public function store(CarTypeRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarTypeController:store----');
            $carType = $this->carTypeService->store($data);
            Log::info('----End CarTypeController:store----');

            return $this->item($carType, new CarTypeTransformer());
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
