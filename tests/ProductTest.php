<?php

class ProductTest extends TestCase
{
    /**
     * Index all products test
     *
     * @return void
     */
    public function test_should_return_all_products()
    {
        $this->get(route('api.v1.products'));
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'id',
                    'name',
                    'stock',
                    'price',
                    'created_at',
                    'updated_at',
                ]
            ],
        ]);
    }
}
