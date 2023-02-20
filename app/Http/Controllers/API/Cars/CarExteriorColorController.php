<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarExteriorColorRequest;
use App\Http\Services\CarExteriorColorService;
use App\Http\Transformers\Cars\CarExteriorColorTransformer;
use Illuminate\Support\Facades\Log;

class CarExteriorColorController extends BaseController
{
    public $carExteriorColorService;
    public function __construct(CarExteriorColorService $carExteriorColorService)
    {
        $this->carExteriorColorService = $carExteriorColorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarExteriorColorController:index----');
            $carExteriorColors = $this->carExteriorColorService->getAll();
            Log::info('----End CarExteriorColorController:index----');

            return $this->collection($carExteriorColors, new CarExteriorColorTransformer());
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
    public function store(CarExteriorColorRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarExteriorColorController:store----');
            $carExteriorColor = $this->carExteriorColorService->store($data);
            Log::info('----End CarExteriorColorController:store----');

            return $this->item($carExteriorColor, new CarExteriorColorTransformer());
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
    public function update(CarExteriorColorRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarExteriorColorController:update----');
            $carExteriorColor = $this->carExteriorColorService->update($data, $id);
            Log::info('----End CarExteriorColorController:update----');

            return $this->item($carExteriorColor, new CarExteriorColorTransformer());
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
            Log::info('----Start CarExteriorColorController:destroy----');
            $this->carExteriorColorService->destroy($id);
            Log::info('----End CarExteriorColorController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
