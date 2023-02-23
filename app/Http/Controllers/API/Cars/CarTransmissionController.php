<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarTransmissionRequest;
use App\Http\Services\CarTransmissionService;
use App\Http\Transformers\Cars\CarTransmissionTransformer;
use Illuminate\Support\Facades\Log;

class CarTransmissionController extends BaseController
{
    public $carTransmissionService;
    public function __construct(CarTransmissionService $carTransmissionService)
    {
        $this->carTransmissionService = $carTransmissionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarTransmissionController:index----');
            $carTransmissions = $this->carTransmissionService->getAll();
            Log::info('----End CarTransmissionController:index----');

            return $this->collection($carTransmissions, new CarTransmissionTransformer());
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
    public function store(CarTransmissionRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarTransmissionController:store----');
            $carTransmission = $this->carTransmissionService->store($data);
            Log::info('----End CarTransmissionController:store----');

            return $this->item($carTransmission, new CarTransmissionTransformer());
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
    public function update(CarTransmissionRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarTransmissionController:update----');
            $carTransmission = $this->carTransmissionService->update($data, $id);
            Log::info('----End CarTransmissionController:update----');

            return $this->item($carTransmission, new CarTransmissionTransformer());
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
            Log::info('----Start CarTransmissionController:destroy----');
            $this->carTransmissionService->destroy($id);
            Log::info('----End CarTransmissionController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
