<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\Product;
use App\Http\Controllers\API\ProductResource;
use App\Http\Controllers\API\Validator;
use App\Http\Requests\CarEngineRequest;
use App\Http\Requests\CarTypeRequest;
use App\Http\Services\CarEngineService;
use App\Http\Services\CarTypeService;
use App\Http\Transformers\Cars\CarEngineTransformer;
use App\Http\Transformers\Cars\CarTypeTransformer;
use App\Models\CarEngine;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarEngineController extends BaseController
{
    public $carEngineService;
    public function __construct(CarEngineService $carEngineService)
    {
        $this->carEngineService = $carEngineService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarEngineController:index----');
            $carEngines = $this->carEngineService->getAll();
            Log::info('----End CarEngineController:index----');

            return $this->collection($carEngines, new CarEngineTransformer());
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
    public function store(CarEngineRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarEngineController:store----');
            $carEngine = $this->carEngineService->store($data);
            Log::info('----End CarEngineController:store----');

            return $this->item($carEngine, new CarEngineTransformer());
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
            $carEngine = CarEngine::find($id);

            return $this->item($carEngine, new CarEngineTransformer());
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
    public function update(CarEngineRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarEngineController:update----');
            $carEngine = $this->carEngineService->update($data, $id);
            Log::info('----End CarEngineController:update----');

            return $this->item($carEngine, new CarEngineTransformer());
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
            $this->carEngineService->destroy($id);
            Log::info('----End CarTypeController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
