@extends('layouts.app')
@section('title','Crear una categoria | Chocoloco')
@section('content')
<div class="container">
    <div id="app">
        <form action="">
            <h1>Crear Categoría</h1>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input v-model="name" class="form-control" type="text" name="name" id="name">
                <label for="slug">Slug</label>
                <input readonly v-model="generateSlug" class="form-control" type="text" name="slug" id="slug">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
            </div>
            <input class="btn btn-primary float-right" type="button" value="Guardar">
        </form>
        <br> {{name}}
        <br> {{generateSlug}}
    </div>
</div>
{{-- Vue --}}
<script>
    var app = new Vue({
        el: '#app',
        data: {
            name: 'Sofia Vánegas'
        },
        computed: {
            generateSlug: function() {
                var char = {
                    "á": "a",
                    "é": "e",
                    "í": "i",
                    "ó": "o",
                    "ú": "u",
                    "ñ": "n",
                    "Á": "A",
                    "É": "E",
                    "Í": "I",
                    "Ó": "O",
                    "Ú": "U",
                    "Ñ": "N",
                    " ": "_"
                }
                var expr = /[áéíóúñÁÉÍÓÚÑ ]/g;
                return this.name.trim().replace(expr, function(e) {
                    return char[e]
                }).toLowerCase()
            }
        }
    });
</script>
