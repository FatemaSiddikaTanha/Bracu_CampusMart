<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      table
      {
        border: 1.5 solid darkblue;
        text-align: center;
      }
      th
      {
        background-color: darkblue;
        padding: 8px;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        color:white;
      }
      td
      {
        color:white;
        padding: 8px;
        border: 1px solid skyblue;
      }
      .table_center
      {
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <div class="table_center">         
           <table>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Status</th>
              <th>Change Status</th>
            </tr>

            @foreach ($data as $data)
             <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->rec_address}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->product->title}}</td>
              <td>{{$data->product->price}}</td>
              <td>
                <img width="100" src="products/{{$data->product->image}}">
              </td>
              <td>
                @if($data->status == 'in progress')
                <span style="color:yellow;">{{$data->status}}</span>
                @elseif($data->status=='On the way')
                <span style="color:red;">{{$data->status}}</span>

                @else
                 <span style="color:deepskyblue;">{{$data->status}}</span>
                @endif
              </td>
              <td>
                <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way
                </a>
                <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered
                </a>
              </td>
             </tr>

            @endforeach
          </table>
          </div>

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>

