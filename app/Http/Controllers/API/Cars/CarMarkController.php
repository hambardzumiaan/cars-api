<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\Product;
use App\Http\Controllers\API\ProductResource;
use App\Http\Controllers\API\Validator;
use App\Http\Requests\CarMarkRequest;
use App\Http\Services\CarMarkService;
use App\Http\Transformers\Cars\CarMarkTransformer;
use Illuminate\Support\Facades\Log;

class CarMarkController extends BaseController
{
    public $carMarkService;
    public function __construct(CarMarkService $carMarkService)
    {
        $this->carMarkService = $carMarkService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarMarkController:index----');
            $carMarks = $this->carMarkService->getAll();
            Log::info('----End CarMarkController:index----');

            return $this->collection($carMarks, new CarMarkTransformer());
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
    public function store(CarMarkRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarMarkController:store----');
            $carMark = $this->carMarkService->store($data);
            Log::info('----End CarMarkController:store----');

            return $this->item($carMark, new CarMarkTransformer());
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
    public function update(CarMarkRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarMarkController:update----');
            $carMark = $this->carMarkService->update($data, $id);
            Log::info('----End CarMarkController:update----');

            return $this->item($carMark, new CarMarkTransformer());
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
            Log::info('----Start CarMarkController:destroy----');
            $this->carMarkService->destroy($id);
            Log::info('----End CarMarkController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
