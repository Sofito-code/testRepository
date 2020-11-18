@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center" style="padding-bottom: 10px">Inicio</h1>
        <div class="row">
            @include('custom.mainSlider')
            <div class="col-sm-2">
                @include('custom.column')
            </div>
            <div class="col" style="width: 924px">
                @guest
                <div class="row justify-content-around" style="margin-top: 20px">
                    <div class="col-md justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                @include('custom.sessionStatus')
                                ¡Bienvenido, nuestros productos son de puro chócolo y nuestra receta lleva con nosotros mas de 20 años 🌽!
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="row justify-content-around" style="margin-top: 20px">
                        <div class="col-md justify-content-center">
                            <div class="card">
                                <div class="card-body">
                                    @include('custom.sessionStatus')

                                    ¡Bienvenido, estas conectado!
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest

            </div>
        </div>
    </div>
@endsection
