<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarTypeRequest;
use App\Http\Services\CarDriveTypeService;
use App\Http\Transformers\Cars\CarDriveTypeTransformer;
use App\Http\Transformers\Cars\CarTypeTransformer;
use Illuminate\Support\Facades\Log;

class CarDriveTypeController extends BaseController
{
    public $carDriveTypeService;
    public function __construct(CarDriveTypeService $carDriveTypeService)
    {
        $this->carDriveTypeService = $carDriveTypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarDriveTypeController:index----');
            $carDriveTypes = $this->carDriveTypeService->getAll();
            Log::info('----End CarDriveTypeController:index----');

            return $this->collection($carDriveTypes, new CarTypeTransformer());
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
            Log::info('----Start CarDriveTypeController:store----');
            $carDriveType = $this->carDriveTypeService->store($data);
            Log::info('----End CarDriveTypeController:store----');

            return $this->item($carDriveType, new CarDriveTypeTransformer());
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
    public function update(CarDriveTypeRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarTypeController:update----');
            $carDriveType = $this->carDriveTypeService->update($data, $id);
            Log::info('----End CarTypeController:update----');

            return $this->item($carDriveType, new CarDriveTypeTransformer());
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
            Log::info('----Start CarDriveTypeController:destroy----');
            $this->carDriveTypeService->destroy($id);
            Log::info('----End CarDriveTypeController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
