

<h1>{{ $product->name }}</h1>
<img src="{{ $product->image_url }}" alt="{{ $product->name }}">
<p>{{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<p>Category: {{ $product->category->category_name }}</p>

