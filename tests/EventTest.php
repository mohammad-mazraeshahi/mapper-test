<?php

use App\Models\Product;
use App\Models\Types\EventTypes;
use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    use DatabaseTransactions;

    /**
     *  Test event request validation
     *
     * @return void
     */
    public function test_event_should_be_validated()
    {
        $this->post(route('api.v1.events'), []);
        $this->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Test create new product event
     *
     * @return void
     */
    public function test_create_product_event()
    {
        $product = factory(Product::class)->make()->toArray();
        $product['id'] = $product['uuid'];
        $product['price'] = "\${$product['price']}";
        unset($product['uuid']);

        $this->post(route('api.v1.events'), [
            "event" => EventTypes::PRODUCT_WAS_CREATED,
            "payload" => $product,
        ]);

        $this->assertResponseStatus(Response::HTTP_ACCEPTED);
    }


    /**
     * Test update a product event
     *
     * @return void
     */
    public function test_update_product_event()
    {
        $product = factory(Product::class)->create([
            'name' => 'test'
        ])->toArray();

        $product['id'] = $product['uuid'];
        $product['price'] = "\${$product['price']}";
        unset($product['uuid']);

        $this->post(route('api.v1.events'), [
            "event" => EventTypes::PRODUCT_WAS_UPDATED,
            "payload" => $product,
        ]);

        $this->assertResponseStatus(Response::HTTP_ACCEPTED);
    }

    /**
     * Test user order product event
     *
     * @return void
     */
    public function test_user_order_product_event()
    {
        $product = factory(Product::class)->create();

        $this->post(route('api.v1.events'), [
            "event" => EventTypes::USER_ORDERED_PRODUCT,
            "payload" => [
                'id' => $product->uuid
            ],
        ]);

        $this->assertResponseStatus(Response::HTTP_ACCEPTED);
    }

    /**
     * Test user order product event
     *
     * @return void
     */
    public function test_user_order_not_exist_product_event()
    {
        $product = factory(Product::class)->make();

        $this->post(route('api.v1.events'), [
            "event" => EventTypes::USER_ORDERED_PRODUCT,
            "payload" => [
                'id' => $product->uuid
            ],
        ]);

        $this->assertResponseStatus(Response::HTTP_ACCEPTED);
    }

    /**
     * Get random event
     *
     * @return string
     */
    private function getRandomEventType()
    {
        $allEventTypes = EventTypes::toArray();
        return $allEventTypes[array_rand($allEventTypes)];
    }
}
