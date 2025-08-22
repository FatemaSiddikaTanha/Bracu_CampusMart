<!-- Latest Product Heading -->
<div style="display: flex; justify-content: center; align-items: center; margin: 50px 0;">
  <h2 style="
    font-family: 'Brush Script MT', cursive;
    font-size: 50px;
    color: #000080;
    font-weight: bold;
    text-align: center;
  ">
    Latest Product
  </h2>
</div>


<!-- Product Card Box -->
<div class="product-card" style="
  max-width: 700px;
  margin: 0 auto 60px auto;
  padding: 30px;
  background-color: #f5fbff;
  border: 2px solid #cce6ff;
  border-radius: 15px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
">

  <div style="text-align: center; margin-bottom: 20px;">
    <img width="100%" style="max-width: 500px; border-radius: 10px;" src="/products/{{$data->image}}" alt="{{$data->title}}">
  </div>

  <div class="detail-box" style="margin-bottom: 15px;">
    <h3 style="font-size: 30px; font-weight: 700; color: #333;">{{$data->title}}</h3>
    <h4 style="font-size: 22px; margin-top: 10px; color: #000;">Price: <span style="color: #0077cc;">${{$data->price}}</span></h4>
  </div>

  <div class="detail-box" style="margin-bottom: 15px;">
    <h5 style="font-size: 20px;">Category: <span style="color: #555;">{{$data->category}}</span></h5>
    <h5 style="font-size: 20px;">Available Quantity: <span style="color: #555;">{{$data->quantity}}</span></h5>
  </div>

  <div class="detail-box">
    <p style="font-size: 18px; color: #444;">{{$data->description}}</p>
  </div>
</div>
