@csrf
<label>
    Titulo de producto
    <input type="text" name="title" value="{{ old('title', $product->title) }}">
</label><br>
<label>
    URL del producto
    <input type="text" name="URL" value="{{old('URL',$product->URL ?? '')}}">
</label><br>
<label>
    Descripcion
    <textarea name="description">{{old('description',$product->description)}}</textarea>
</label><br>
<label>
    Precio
    <input type="text" name="price" value="{{old('price',$product->price)}}">
</label><br>
<button>{{$btnText}}</button>
