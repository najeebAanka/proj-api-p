<!DOCTYPE html>
<?php use Carbon\Carbon; ?>
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
                        <h4 class="fw-bold"> Gold Prices</h4>


                        <div class="page-content fade-in-up">



                            <div class="ibox">
                                <div class="ibox-head" style=" text-align:right;">

                                </div>
                                <div class="ibox-body">

                                    @include('dashboard.shared.messages')

                                    <div class="card">
                                        <h5 class="card-header">Current Prices <span style="margin-left: 70%">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#backDropModal" style="margin-bottom: 10px;">
                                                    Create
                                                </button></span></h5>
                                        <hr style="margin: 0!important">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th>ID</th>
                                                        <th>Country</th>
                                                        <th>Unit</th>
                                                        <th>Price</th>
                                                        <th>Currency</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">

                                                    <?php
                                      $data = \App\Models\GoldPrice::orderBy('id' ,'desc')->paginate(10);
                                      foreach ($data as $d) { ?>
                                                    <tr <?php
                                                    if($d->created_at->isToday()){echo "style=' background-color: rgb(208 232 208);border: solid 1px white;'";} 
                                                    else{echo"style='background-color: rgb(255 233 233);border: solid 1px white;'";}?>>


                                                        <td><?php echo $d->id; ?></td>
                                                        <td> <?php
                                                          $data1 = \App\Models\Country::find($d->country_id);
                                                           echo $data1->name_en ?></td>
                                                           <td> <?php
                                                            $data2 = \App\Models\GoldUnit::find($d->unit_id);
                                                             echo $data2->name_en ?></td>
                                                        <td><?php echo $d->amount; ?></td>
                                                        <td> <?php
                                                            $data3 = \App\Models\Country::find($d->country_id);
                                                             echo $data3->currency_en ?></td>

                                                       <td> <?php
                                                       $data4 = \App\Models\GoldPrice::find($d->id);
                                                       echo $data4->created_at->format('d/m/Y') ?></td>
                                                        <td>


                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <button type="button"
                                                                        class="btn btn-default btn-md m-r-5 dropdown-item"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#backDropModal<?php echo $d->id; ?>"
                                                                        style="margin-bottom: 3px">
                                                                        <i class="bx bx-edit-alt me-1"></i>
                                                                        Edit</button>



                                                                    <form method="post"
                                                                        action="{{ url('dashboard/backend/gold-prices/delete') }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="id"
                                                                            value="<?php echo $d->id; ?>" />
                                                                        <button
                                                                            class="btn btn-default btn-md dropdown-item"
                                                                            type="submit"
                                                                            onclick="return confirm('Are you sure? ')"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Delete">
                                                                            {{-- <i class="fa fa-trash font-14"></i> --}}
                                                                            <i class="bx bx-trash me-1"></i>Delete
                                                                        </button>

                                                                    </form>
                                                                </div>
                                                            </div>



                                                            <div class="modal fade"
                                                                id="backDropModal<?php echo $d->id; ?>" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true" data-bs-backdrop="static">
                                                                <div class="modal-dialog">



                                                                    <form class="modal-content" method="post"
                                                                        action="{{ url('dashboard/backend/gold-prices/edit') }}"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="id"
                                                                            value="<?php echo $d->id; ?>" />
                                                                        <div class="modal-header">
                                                                            <h5 
                                                                                id="exampleModalLabel">Edit <?php
                                                                                $data__0 = \App\Models\GoldUnit::where('id', $d->unit_id)->first();
                                                                                 ?>
           
                                                                               <span style="margin-left: 2px;
                                                                               font-size: 18px;
                                                                               color: #0c36e0;"
                                                                               ><?php echo $data__0->name_en; ?> </span> Gold Price in <?php
                                                                                $data__00 = \App\Models\Country::where('id', $d->country_id)->first();?>
           
                                                                               <span style="margin-left: 2px;
                                                                               font-size: 18px;
                                                                               color: #0c36e0;"
                                                                               ><?php echo $data__00->name_en; ?> </span> <?php
                                                                               $data5 = \App\Models\GoldPrice::find($d->id);
                                                                               echo " for " . "<span style='margin-left: 2px; font-size: 18px;color: #0c36e0;'>" . $data5->created_at->format('d/m/Y') . "</span>"; ?></h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>

                                                                            </button>

                                                                        </div>


                                                                        <div class="modal-body">

                                                                           

                                                                            <div class="col mb-0">
                                                                                <label for="amount"
                                                                                    class="form-label">Price</label>
                                                                                <input name="amount" type="number" step="0.00001"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Price"
                                                                                    value="<?php echo $d->amount; ?>"
                                                                                    required />
                                                                            </div>





                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save</button>
                                                                        </div>
                                                                    </form>



                                                                </div>
                                                            </div>





                                                        </td>
                                                    </tr>


                                                    <?php
                                      }
                                      ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                                <div class="modal-dialog">

                                    <form onsubmit="checkToExecute()" class="modal-content" method="post"
                                        action="{{ url('dashboard/backend/gold-prices/add') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Add New Price</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="col mb-0">
                                                <label for="nameBackdrop" class="form-label">Country</label>
                                                <select name="country_id" class="form-control" required>

                                                    <?php
                                                       $data_ = \App\Models\Country::get();
                                                         foreach ($data_ as $d_) { ?>

                                                    <option value="<?php echo $d_->id; ?>">
                                                        <?php echo $d_->name_en; ?>
                                                    </option>

                                                    <?php
                                                        }
                                                   ?>
                                                </select>
                                            </div>
                                            <div class="col mb-0">
                                                <label for="nameBackdrop" class="form-label">Unit</label>
                                                <select name="unit_id" class="form-control" required>
                                                          


                                                  <?php
                                           $data__ = \App\Models\GoldUnit::get();
                                                    foreach ($data__ as $do) { ?>

                                                   <option
                                                   value="<?php echo $do->id; ?>"><?php echo $do->name_en; ?> </option>

                                                   <?php
                                                   }
                                                     ?>
                                        </select>
                                            </div>

                                            <div class="col mb-0">
                                                <label for="amount" class="form-label">Price</label>
                                                <input name="amount" type="number" step="0.00001" class="form-control"
                                                    placeholder="Enter Price" required />
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>






                            <!-- / Content -->
                            @include('dashboard.shared.pagination')
                            {{-- {{$data->links()}} --}}
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
