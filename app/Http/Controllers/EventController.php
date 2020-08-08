<?php

namespace App\Http\Controllers;

use App\Events\CreateProductEvent;
use App\Events\ProductOrderEvent;
use App\Events\UpdateProductEvent;
use App\Http\Requests\EventRequest;
use App\Models\Product;
use App\Models\Types\EventTypes;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Receive all Events and add  to queue
     *
     * @method POST
     * @param EventRequest $request
     * @return Response
     */
    public function receive(EventRequest $request)
    {
        $validatedData = $request->validated();

        switch ($validatedData['event']) {
            case EventTypes::PRODUCT_WAS_CREATED :
                $product = new Product($validatedData['payload']);
                event(new CreateProductEvent($product));
                break;
            case EventTypes::PRODUCT_WAS_UPDATED :
                $product = new Product($validatedData['payload']);
                event(new UpdateProductEvent($product));
                break;
            case EventTypes::USER_ORDERED_PRODUCT :
                $product = new Product($validatedData['payload']);
                event(new ProductOrderEvent($product));
                break;
            default:
        }

        return response([
            'status' => 'OK'
        ], Response::HTTP_ACCEPTED);
    }
}
