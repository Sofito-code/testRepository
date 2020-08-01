<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * @test
     */
    public function itCanSearchProductsByTitle()
    {

        $product = factory(Product::class)->create();

        $filters = [
            'filter' => [
                'first_name' => 'arepa'
            ]
        ];
        $response = $this->actingAs($product)
            ->get(route('product.index', $filters));
        $responseProducts = $response->getOriginalContent()['products'];
        $this->assertEquals($responseProducts->first()->id, $product->id);
    }
}
