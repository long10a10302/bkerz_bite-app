

<h1>Products</h1>
<div class="product-list">
    @foreach($products as $product)
        <div class="product-item">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <a href="{{ route('products.show', $product->product_id) }}">View Details</a>
        </div>
    @endforeach
</div>
