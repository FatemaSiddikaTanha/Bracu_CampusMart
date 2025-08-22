<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">

    <h2 class="text-center my-4">Dashboard Bar Overview</h2>

    
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <canvas id="dashboardChart" height="150"></canvas>
      </div>
    </div>

  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('dashboardChart').getContext('2d');
  const dashboardChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Total Clients', 'Total Products', 'Total Orders', 'Total Delivered'],
          datasets: [{
              label: 'Count',
              data: [{{ $user }}, {{ $product }}, {{ $order }}, {{ $delivered }}],
              backgroundColor: [
                  '#3490dc', 
                  '#38c172', 
                  '#ffed4a', 
                  '#e3342f'
              ],
              borderRadius: 10, 
              barPercentage: 0.6
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  display: false
              },
              tooltip: {
                  enabled: true
              }
          },
          scales: {
              y: {
                  beginAtZero: true,
                  ticks: {
                      stepSize: 1
                  }
              }
          }
      }
  });
</script>

