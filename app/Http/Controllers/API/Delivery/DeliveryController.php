<?php

namespace App\Http\Controllers\API\Delivery;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\DeliveryPlanRequest;
use App\Http\Services\DeliveryPlanService;
use App\Http\Transformers\Delivery\DeliveryPlanTransformer;
use App\Models\DeliveryPlan;
use Illuminate\Support\Facades\Log;

class DeliveryController extends BaseController
{
    public $deliveryPlanService;
    public function __construct(DeliveryPlanService $deliveryPlanService)
    {
        $this->deliveryPlanService = $deliveryPlanService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        try {
            Log::info('----Start DeliveryController:index----');
            $plans = $this->deliveryPlanService->getAll();
            Log::info('----End DeliveryController:index----');

            return $this->collection($plans, new DeliveryPlanTransformer());
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
    public function store(DeliveryPlanRequest $request)
    {
        try {
            $data = $request->all();
            Log::info('----Start DeliveryController:store----');
            $plan = $this->deliveryPlanService->store($data);
            Log::info('----End DeliveryController:store----');

            return $this->item($plan, new DeliveryPlanTransformer());
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
            $plan = DeliveryPlan::find($id);

            return $this->item($plan, new DeliveryPlanTransformer());
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
    public function update(DeliveryPlanRequest $request, $id)
    {
        try {
            $data = $request->all();
            Log::info('----Start DeliveryController:update----');
            $plan = $this->deliveryPlanService->update($data, $id);
            Log::info('----End DeliveryController:update----');

            return $this->item($plan, new DeliveryPlanTransformer());
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
            Log::info('----Start DeliveryController:destroy----');
            $this->deliveryPlanService->destroy($id);
            Log::info('----End DeliveryController:destroy----');

            return [];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
