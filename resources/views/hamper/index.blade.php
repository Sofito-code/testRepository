@extends('layouts.app')
@section('content')

<div class="lomasvendidocontenedor">
    <div class="section_title text-center">Lo mas Visto</div>
    <br>
        <div class="lomasvendido owl-carousel owl-theme">
            <!-- item-->
            <div class="">
                <div class="product">
                    <div class="product_image"><img src="/css/images/product_5.jpg" alt=""></div>
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="product_category">In <a href="category.html">Category</a></div>
                                <div class="product_price text-right">$3<span>.99</span></div>
                            </div>
                        </div>
                        <div class="product_buttons">
                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                    <div><div><img src="/css/images/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item-->
            <div class="item">
                <div class="">
                    <div class="product">
                        <div class="product_image"><img src="/css/images/product_6.jpg" alt=""></div>
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="product_category">In <a href="category.html">Category</a></div>
                                        <div class="product_price text-right">$3<span>.99</span></div>
                                    </div>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="/css/images/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <br>

    <br>
@endsection
