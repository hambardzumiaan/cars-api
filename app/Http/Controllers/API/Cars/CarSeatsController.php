<?php

namespace App\Http\Controllers\API\Cars;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CarSeatRequest;
use App\Http\Services\CarSeatService;
use App\Http\Transformers\Cars\CarSeatTransformer;
use App\Models\CarSeat;
use Illuminate\Support\Facades\Log;

class CarSeatsController extends BaseController
{
    public $carSeatService;
    public function __construct(CarSeatService $carSeatService)
    {
        $this->carSeatService = $carSeatService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start CarSeatsController:index----');
            $carSeats = $this->carSeatService->getAll();
            Log::info('----End CarSeatsController:index----');

            return $this->collection($carSeats, new CarSeatTransformer());
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
    public function store(CarSeatRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarSeatsController:store----');
            $carType = $this->carSeatService->store($data);
            Log::info('----End CarSeatsController:store----');

            return $this->item($carType, new CarSeatTransformer());
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
            $carSeat = CarSeat::find($id);

            return $this->item($carSeat, new CarSeatTransformer());
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
    public function update(CarSeatRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start CarSeatsController:update----');
            $carSeat = $this->carSeatService->update($data, $id);
            Log::info('----End CarSeatsController:update----');

            return $this->item($carSeat, new CarSeatTransformer());
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
            Log::info('----Start CarSeatsController:destroy----');
            $this->carSeatService->destroy($id);
            Log::info('----End CarSeatsController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
