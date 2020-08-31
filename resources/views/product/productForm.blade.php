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
    <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Ruta del producto (slug)') }}</label>

    <div class="col-md-6">
        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $product->slug ?? '') }}" required autocomplete="slug">

        @error('slug')
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
    <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de productos disponibles') }}</label>

    <div class="col-md-6">
        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $product->quantity ?? '') }}" required autocomplete="quantity">

        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

    <div class="col-md-6">

        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}"
                    @isset($product->category_id)
                        @if ($category->id == $product->category_id)
                            selected
                        @endif
                     @endisset
                >{{$category->name}}</option>
            @endforeach
          </select>
        @error('category_id')
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
<div class="form-group row">
    <label for="main_slider" class="col-md-4 col-form-label text-md-right">{{ __('Aparecer en el slider principal') }}</label>

    <div class="col-md-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="main_sliderYes" name="main_slider"
             class="custom-control-input" value="ye"
             @if($product['main_slider']=='ye')
                 checked
             @elseif(old('main_slider')=='ye')
                 checked
             @endif>
            <label class="custom-control-label" for="main_sliderYes">Si</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="main_sliderNo" name="main_slider"
            class="custom-control-input" value="no"
            @if($product['main_slider']=='no')
                 checked
             @elseif(old('main_slider')=='no')
                 checked
             @endif>
            <label class="custom-control-label" for="main_sliderNo">No</label>
          </div>
        @error('main_slider')
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

