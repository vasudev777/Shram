<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shram-Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
 <?php  include('header.php');   ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php  include('left_menu.php');   ?>
 
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

               
                <div class="card-body">
                  <h5 class="card-title">Labours</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                                        $query = "SELECT * FROM labour_details";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>
                      </h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

               
                <div class="card-body">
                  <h5 class="card-title">Customers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        
                      <?php
                                        $query = "SELECT * FROM cust_details";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>
                      </h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

               
                <div class="card-body">
                  <h5 class="card-title">Builders</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-user' ></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                                        $query = "SELECT * FROM build_details";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>
                      </h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

        <!-- Charts -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Shop Analysis</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    title: {
                      text: 'Total Items',
                     
                      left: 'center'
                    },
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: '',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php
                                        $query = "SELECT * FROM items where i_type='mason'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Mason'
                        },
                        {
                          value: <?php
                                        $query = "SELECT * FROM items where i_type='carpentor'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Carpenter'
                        },
                        {
                          value: <?php
                                        $query = "SELECT * FROM items where i_type='welder'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Welder'
                        }
                        ,
                        {
                          value: <?php
                                        $query = "SELECT * FROM items where i_type='plumber'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Plumber'
                        },
                        {
                          value: <?php
                                        $query = "SELECT * FROM items where i_type='painter'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Painter'
                        },
                        {
                          value: <?php
                                        $query = "SELECT * FROM items where i_type='electrician'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Electrician'
                        },
                        
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Request Analysis</h5>

              <!-- Donut Chart -->
              <div id="donutChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#donutChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: '',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: <?php
                                        $query = "SELECT * FROM build_cust_book";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Builder Request'
                        },
                        {
                          value: <?php
                                        $query = "SELECT * FROM labour_cust_book";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Labours Request'
                        },
                        {
                          value: <?php
                                        $query = "SELECT * FROM build_labour_book";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>,
                          name: 'Builder-Labour request'
                        }
                        

                      ]
                    }]
                  });
                });
              </script>
              <!-- End Donut Chart -->

            </div>
          </div>
        </div>

        <!-- End charts -->

        

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include('footer.php') ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>