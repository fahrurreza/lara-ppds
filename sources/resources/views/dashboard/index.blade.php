@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light"
                                id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-5 col-lg-6">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">PPDS</h5>
                            <h3 class="mt-3 mb-3">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>
                                    5.27%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i
                                    class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Supervisor
                            </h5>
                            <h3 class="mt-3 mb-3">5,543</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                    1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i
                                    class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Admin</h5>
                            <h3 class="mt-3 mb-3">$6,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                    7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Transaction</h5>
                            <h3 class="mt-3 mb-3">+ 30.56%</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>
                                    4.87%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->

        <div class="col-xl-7 col-lg-6">
            <div class="card card-h-100">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Status Portofolio PPDS</h4>
                </div>
                <div class="card-body pt-0">
                    <div dir="ltr">
                        <div id="high-performing-product" class="apex-charts"
                            data-colors="#727cf5,#e3eaef"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
      </div>
      <!-- end row -->



      <div class="row">
        <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Portofolio List&nbsp;&nbsp;<span class="badge bg-dark float-end text-right">9</span></h4>
                </div>

                <div class="card-body pt-0">
                    <!-- HTML -->
                    <div class="card-body py-0" data-simplebar
                        style="max-height: 350px;max-width: 100%;">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Trx</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Supervisor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-dark">PT/032023/005</button></td>
                                        <td>Adam Baldwin</td>
                                        <td>22/03/2023</td>
                                        <td>Dr.Amira</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-dark">PT/032023/006</button></td>
                                        <td>Gesha Akbar</td>
                                        <td>22/03/2023</td>
                                        <td>Dr.Amira</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-dark">PT/032023/007</button></td>
                                        <td>Eka Darmawan</td>
                                        <td>22/03/2023</td>
                                        <td>Dr.Amira</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-dark">PT/032023/008</button></td>
                                        <td>Yuli</td>
                                        <td>22/03/2023</td>
                                        <td>Dr.Amira</td>
                                    </tr> <!-- end tr -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Revision List&nbsp;&nbsp;<span class="badge bg-warning float-end text-right">12</span></h4>
                </div>

                <div class="card-body pt-0">
                    <!-- HTML -->
                    <div class="card-body py-0" data-simplebar
                        style="max-height: 350px;max-width: 100%;">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Trx</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-warning">PT/032023/001</button></td>
                                        <td>Adam Baldwin</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-warning">PT/032023/002</button></td>
                                        <td>Gesha Akbar</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-warning">PT/032023/003</button></td>
                                        <td>Eka Darmawan</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-warning">PT/032023/004</button></td>
                                        <td>Yuli</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Approved List&nbsp;&nbsp;<span class="badge bg-primary float-end text-right">9</span></h4>
                </div>

                <div class="card-body pt-0">
                    <!-- HTML -->
                    <div class="card-body py-0" data-simplebar
                        style="max-height: 350px;max-width: 100%;">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Trx</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-primary">PT/032023/005</button></td>
                                        <td>Adam Baldwin</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-primary">PT/032023/006</button></td>
                                        <td>Gesha Akbar</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-primary">PT/032023/007</button></td>
                                        <td>Eka Darmawan</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                    <tr>
                                        <td><button type="button" class="btn btn-outline-primary">PT/032023/008</button></td>
                                        <td>Yuli</td>
                                        <td>22/03/2023</td>
                                    </tr> <!-- end tr -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
      </div>
        <!-- end row -->

    </div>
    <!-- container -->

  </div>
  <!-- content -->

</div>

@endsection