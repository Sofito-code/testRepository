<?php

namespace App\Actions\Hamper;

use App\Product;
use App\User;
use Darryldecode\Cart\Cart;

class HamperActions
{
    public static function add(User $userID, Product $product)
    {
        /* Cart::session($userID)->add(array(
            'id' => $product->id(),
            'name' => $product->name(),
            'price' => $product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $product
        )); */
    }
}
