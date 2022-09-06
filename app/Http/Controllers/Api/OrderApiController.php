<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Services\OrderService;

class OrderApiController extends Controller
{

    public function __construct(private OrderService $orderService)
    {}

    public function index()
    {
        return $this->orderService->getAllOrders();
    }


    public function store(StoreOrderRequest $request)
    {
        $data = $request->all();
        $data['responder_id'] = $data['product_id'];
        return $this->orderService->createOrder($data);
    }



    public function getByRespondeId(StoreOrderRequest $request)
    {
        $id = 10;
        return $this->orderService->getOrderByResponderId($id);
    }
}
