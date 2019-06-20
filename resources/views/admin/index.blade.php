@section('content')
  <div class="row">
    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Budget
              </h6>
              <!-- Heading -->
              <span class="h2 mb-0">
                $24,500
              </span>
              <!-- Badge -->
              <span class="badge badge-soft-success mt-n1">
                +3.5%
              </span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
    </div>
  </div> <!-- / .row -->

  <div class="row">
    <div class="col-12 col-xl-8">

      <!-- Orders -->
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">

              <!-- Title -->
              <h4 class="card-header-title">
                Orders
              </h4>

            </div>
            <div class="col-auto mr-n3">

              <!-- Caption -->
              <span class="text-muted">
                Show affiliate:
              </span>

            </div>
            <div class="col-auto">

              <!-- Switch -->
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#ordersChart" data-add='{"data":{"datasets":[{"data":[15,10,20,12,7,0,8,16,18,16,10,22],"backgroundColor":"#d2ddec","label":"Affiliate"}]}}'>
                <label class="custom-control-label" for="cardToggle"></label>
              </div>

            </div>
          </div> <!-- / .row -->

        </div>
        <div class="card-body">

          <!-- Chart -->
          <div class="chart">
            <canvas id="ordersChart" class="chart-canvas"></canvas>
          </div>

        </div>
      </div>

    </div>
    <div class="col-12 col-xl-4">

      <!-- Devices -->
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">

              <!-- Title -->
              <h4 class="card-header-title">
                Devices
              </h4>

            </div>
            <div class="col-auto">

              <!-- Tabs -->
              <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update='{"data":{"datasets":[{"data":[60,25,15]}]}}'>
                  <a href="#" class="nav-link active" data-toggle="tab">
                    All
                  </a>
                </li>
                <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update='{"data":{"datasets":[{"data":[15,45,20]}]}}'>
                  <a href="#" class="nav-link" data-toggle="tab">
                    Direct
                  </a>
                </li>
              </ul>

            </div>
          </div> <!-- / .row -->

        </div>
        <div class="card-body">

          <!-- Chart -->
          <div class="chart chart-appended">
            <canvas id="devicesChart" class="chart-canvas" data-target="#devicesChartLegend"></canvas>
          </div>

          <!-- Legend -->
          <div id="devicesChartLegend" class="chart-legend"></div>

        </div>
      </div>

    </div>
  </div> <!-- / .row -->
@endsection
