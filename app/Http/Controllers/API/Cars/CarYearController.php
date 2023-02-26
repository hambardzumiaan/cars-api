<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarYearRequest;
use App\Http\Services\CarYearService;
use App\Http\Transformers\Cars\CarYearTransformer;
use App\Models\CarYear;
use Illuminate\Support\Facades\Log;

class CarYearController extends BaseController
{
    public $carYearService;
    public function __construct(CarYearService $carYearService)
    {
        $this->carYearService = $carYearService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarYearController:index----');
            $carYears = $this->carYearService->getAll();
            Log::info('----End CarYearController:index----');

            return $this->collection($carYears, new CarYearTransformer());
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
    public function store(CarYearRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarYearController:store----');
            $carYear = $this->carYearService->store($data);
            Log::info('----End CarYearController:store----');

            return $this->item($carYear, new CarYearTransformer());
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
            $carYear = CarYear::find($id);

            return $this->item($carYear, new CarYearTransformer());
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
    public function update(CarYearRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarYearController:update----');
            $carYear = $this->carYearService->update($data, $id);
            Log::info('----End CarYearController:update----');

            return $this->item($carYear, new CarYearTransformer());
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
            Log::info('----Start CarYearController:destroy----');
            $this->carYearService->destroy($id);
            Log::info('----End CarYearController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
