@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-2">
            @include('custom.column')
        </div>
        <div class="col" style="width: 924px">
            @include('auth.cardVerify')
            @include('custom.slider')
        </div>
    </div>
</div>
@endsection
