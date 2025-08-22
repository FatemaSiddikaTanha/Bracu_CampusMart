<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Orders</title>
  @include('home.css')

  <style>
    .div_center {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }
    table {
      border: 2px solid darkblue;
      text-align: center;
      width: 800px;
      border-collapse: collapse;
    }
    th {
      border: 2px solid lightblue;
      background-color: darkgrey;
      color: white;
      font-size: 25px;
      font-weight: bold;
      text-align: center;
      padding: 10px;
    }
    td {
      border: 1px solid deepskyblue;
      padding: 15px;
    }
  </style>
</head>
<body>
<div class="hero_area">
    @include('home.header')

    <div class="div_center">
      <table>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Delivery Status</th>
          <th>Image</th>
        </tr>

        @forelse($order as $order)
        <tr>
          <td>{{ $order->product->title ?? 'No product' }}</td>
          <td>{{ $order->product->price ?? 'N/A' }}</td>
          <td>{{ $order->status }}</td>
          <td>
            @if($order->product && $order->product->image)
              <img height="200" width="200" src="products/{{$order->product->image}}">
            @else
              No Image
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4">No orders found.</td>
        </tr>
        @endforelse

      </table>
    </div>
</div>

@include('home.footer')
</body>
</html>











