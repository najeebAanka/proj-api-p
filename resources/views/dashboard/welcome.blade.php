<!DOCTYPE html>

@include('dashboard.shared.css')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
           @include('dashboard.shared.side-nav')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('dashboard.shared.top-nav')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

              {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> Sub menu</h4> --}}



              <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                  <div class="" style="margin-bottom: 8%;">
                    <div class="card">
                      <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                          <div class="card-body">
                            <h5 class="card-title text-primary">Welcome to <span style="color: #a16825">sab_test</span> admin panel ! 🎉</h5>
                            <p class="mb-4" style="text-align: justify">
                              Here you can manage <span class="fw-bold">Every Thing</span> in your application. Check the provided options on the left-side menu.
                            </p>

                            <a href="{{url("dashboard/sections")}}" class="btn btn-sm btn-outline-primary">View Sections</a>
                          </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                          <div class="card-body pb-0 px-0 px-md-4">
                            <img
                              src="{{asset("assets/img/backgrounds/sab_test_Logo_._Png-removebg-preview-2.png")}}"
                              height="140"
                              style="margin-bottom: 15px"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">

                      {{-- <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-user"></i>

                            </div>
                            <a href="{{url("dashboard/users")}}"><span class="fw-semibold d-block mb-1">Users</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\User::get();
                              echo $d->count();
                          ?></h3>
                          </div>
                        </div>
                      </div> --}}

                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-user"></i>

                            </div>
                            <a href="{{url("dashboard/users")}}"><span class="fw-semibold d-block mb-1">Users</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\User::get();
                              echo $d->count();
                            ?></h3>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-box"></i>

                            </div>
                            <a href="{{url("dashboard/leads")}}"><span class="fw-semibold d-block mb-1">Leads</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\Lead::get();
                              echo $d->count();
                          ?></h3>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>



                  <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">

                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-collection"></i>

                            </div>
                            <a href="{{url("dashboard/countries")}}"><span class="fw-semibold d-block mb-1">Countries</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\Country::get();
                              echo $d->count();
                          ?></h3>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-copy"></i>

                            </div>
                            <a href="{{url("dashboard/products")}}"><span class="fw-semibold d-block mb-1">Products</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\Product::get();
                              echo $d->count();
                          ?></h3>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>


                  <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">

                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-detail"></i>

                            </div>
                            <a href="{{url("dashboard/blogs")}}"><span class="fw-semibold d-block mb-1">Blogs</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\Blog::get();
                              echo $d->count();
                          ?></h3>
                          </div>
                        </div>
                      </div>



                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                              <i class="menu-icon tf-icons bx bx-dock-top"></i>

                            </div>
                            <a href="{{url("dashboard/sections")}}"><span class="fw-semibold d-block mb-1">Sections</span></a>
                            <h3 class="card-title mb-2"><?php
                              $d = \App\Models\Section::get();
                              echo $d->count();
                          ?></h3>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>




                    </div>
                  </div>
                </div>













              <div class="row">




              </div>
              <div class="row">



              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('dashboard.shared.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

@include('dashboard.shared.js')
  </body>
</html>
