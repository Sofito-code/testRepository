@csrf
{{ csrf_field() }}

<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $product->title ?? '') }}" required autocomplete="title" autofocus>

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="URL" class="col-md-4 col-form-label text-md-right">{{ __('Ruta del producto (URL/Link)') }}</label>

    <div class="col-md-6">
        <input id="URL" type="text" class="form-control @error('URL') is-invalid @enderror" name="URL" value="{{ old('URL', $product->URL ?? '') }}" required autocomplete="URL">

        @error('URL')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

    <div class="col-md-6">
        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{old('description',$product->description ?? '')}}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

    <div class="col-md-6">
        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price ?? '') }}" required autocomplete="price">

        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

    <div class="col-md-6">
    <input id="image" type="file" name="image" class=" @error('image') is-invalid @enderror" value="{{old('image', $product->image ?? '')}}">

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success">
            {{ __('Enviar') }}
        </button>
    </div>
</div>
