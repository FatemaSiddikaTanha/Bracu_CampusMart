<section class="slider_section">
  
  <style>
    .bracu-mart-banner {
      background: linear-gradient(to right, #e6f0ff, #f2f9ff);
      padding: 20px; /* reduced from 40px */
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 900px;
      margin: 20px auto; 
    }

    .bracu-mart-banner img {
      max-width: 100px; 
      width: 100%;       
      display: block;
      margin: 0 auto 10px; 
    }

    .bracu-mart-banner h1 {
      font-size: 42px; 
      color: #000080; 
      font-weight: bold;
      margin: 10px auto; 
      padding: 15px; 
      background-color: #cce0ff; 
      border-radius: 20px;
      display: inline-block; 
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .bracu-mart-banner h1 span {
      color: #000080; 
    }

    .bracu-mart-banner p {
      font-size: 18px; 
      color: #555;
      margin-top: 10px; 
      margin-bottom: 0; 
    }

    @media (max-width: 700px) {
      .bracu-mart-banner h1 {
        font-size: 28px;
        padding: 10px 15px;
      }
      .bracu-mart-banner p {
        font-size: 14px;
      }
    }
  </style>

  
  <div class="bracu-mart-banner">
    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="BRACU Mart Logo">

    <!-- Heading with smaller box -->
    <h1>Welcome to <span>BRACU Mart</span></h1>
    <p>Your Campus Mates Shopping Place!!</p>
  </div>
</section>
