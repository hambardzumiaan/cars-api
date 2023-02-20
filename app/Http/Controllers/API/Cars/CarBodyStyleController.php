<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarBodyStyleRequest;
use App\Http\Services\CarBodyStyleService;
use App\Http\Transformers\Cars\CarBodyStyleTransformer;
use Illuminate\Support\Facades\Log;

class CarBodyStyleController extends BaseController
{
    public $carBodyStyleService;
    public function __construct(CarBodyStyleService $carBodyStyleService)
    {
        $this->carBodyStyleService = $carBodyStyleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarBodyStyleController:index----');
            $carBodyStyles = $this->carBodyStyleService->getAll();
            Log::info('----End CarBodyStyleController:index----');

            return $this->collection($carBodyStyles, new CarBodyStyleTransformer());
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
    public function store(CarBodyStyleRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarBodyStyleController:store----');
            $carBodyStyle = $this->carBodyStyleService->store($data);
            Log::info('----End CarBodyStyleController:store----');

            return $this->item($carBodyStyle, new CarBodyStyleTransformer());
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
    public function update(CarBodyStyleRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarBodyStyleController:update----');
            $carBodyStyle = $this->carBodyStyleService->update($data, $id);
            Log::info('----End CarBodyStyleController:update----');

            return $this->item($carBodyStyle, new CarBodyStyleTransformer());
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
            Log::info('----Start CarBodyStyleController:destroy----');
            $this->carBodyStyleService->destroy($id);
            Log::info('----End CarBodyStyleController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
