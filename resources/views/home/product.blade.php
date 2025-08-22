<section class="shop_section layout_padding">
    <style>
        /* Latest Products Heading */
        .latest-products-heading {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            font-size: 42px;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            padding-bottom: 10px;
            margin-bottom: 50px;
        }

        .search-filter-container input,
        .search-filter-container select {
            height: 40px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 0 10px;
        }

        .search-filter-container button {
            height: 40px;
            border-radius: 5px;
        }

        /* Product Box */
        .box {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            overflow: hidden;
            background-color: #fff; 
        }

        .img-box {
            background-color: #fff; 
            padding: 15px;
            text-align: center;
        }

        .img-box img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .detail-box h6 {
            margin: 10px 0;
            font-weight: 600;
        }
    </style>

    <div class="container">
        <!-- Heading -->
        <div class="heading_container heading_center">
            <h2 class="latest-products-heading">
                All Products
            </h2>
        </div>

        <!-- Search & Price Filter -->
        <div style="margin-bottom: 30px; text-align: center;">
            <form action="{{ url('/home') }}" method="GET" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                <input 
                    type="text" 
                    name="query" 
                    placeholder="Search products." 
                    style="width: 300px; padding: 5px;" 
                    value="{{ request('query') }}"
                >
                <select name="price_filter" style="width: 150px; padding: 5px;">
                <option value="">All Prices</option>
                 <option value="low" @selected(request('price_filter') == 'low')>Low to High</option>
                <option value="high" @selected(request('price_filter') == 'high')>High to Low</option>
                </select>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="row">
            @foreach($product as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$product->title}}</h6>
                            <h6>Price <span>${{$product->price}}</span></h6>
                        </div>
                        <div style="padding: 10px">
                            <a class="btn btn-danger" href="{{url('product_details',$product->id)}}">Details</a>
                            <a class="btn btn-primary" href="{{url('add_cart',$product->id)}}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
