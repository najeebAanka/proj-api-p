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
              <h4 class="fw-bold"> App Settings</h4>


            <div class="page-content fade-in-up">
       
        
       
              <div class="ibox">
                  <div class="ibox-head" style=" text-align:right;">

                  </div>
                  <div class="ibox-body">
                   
                      @include('dashboard.shared.messages')     
      
                      <div class="card">
                        <h5 class="card-header">Current Settings <span style="margin-left: 70%">
                          <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#backDropModal"
                            style="margin-bottom: 10px;"
                            hidden
                          >
                            Create
                          </button></span></h5>
                        <hr style="margin: 0!important">
                      <div class="table-responsive text-nowrap">
                          <table class="table">
                              <thead>
                                  <tr>
                                
                                      <th>ID</th>
                                      <th>Code</th>
                                      <th>Content (English)</th>
                                      <th>Content (Arabic)</th>
                                      <th>Actions</th>
                              
                                  </tr>
                              </thead>
                              <tbody class="table-border-bottom-0">
      
                                  <?php
                                      $data = \App\Models\AppSetting::orderBy('id' ,'desc')->paginate(10);
                                      foreach ($data as $d) { ?>
                                      <tr>
                                    
                                          <td><?php echo $d->id; ?></td>
                                          <td><?php echo $d->code ?></td>
                                          <td><?php if (strlen(strip_tags($d->contents_en)) > 150){ echo substr(strip_tags($d->contents_en) ,0,150)."..";} else{echo strip_tags($d->contents_en);}  ?></td>
                                          <td><?php if (strlen(strip_tags($d->contents_ar)) > 150){ echo substr(strip_tags($d->contents_ar) ,0,150)."..";} else{echo strip_tags($d->contents_ar);}  ?></td>
                                          
                                          <td>
                                              

                                               <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                  <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                  <button
                                                     type="button"
                                                     class="btn btn-default btn-md m-r-5 dropdown-item"
                                                     data-bs-toggle="modal"
                                                     data-bs-target="#backDropModal<?php echo $d->id; ?>"
                                                     style="margin-bottom: 3px">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit</button>

                                                    
                                   
                                                <form method="post" action="{{url('dashboard/backend/app-settings/delete')}}">
                                                  {{csrf_field()}}
                                              <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                              {{-- <button class="btn btn-default btn-md dropdown-item" type="submit"
                                                 onclick="return confirm('Are you sure? ')"
      
                                               data-toggle="tooltip" data-original-title="Delete">
                                               <i class="bx bx-trash me-1"></i>Delete
                                              </button> --}}
                                         
                                               </form>
                                              </div></div>
                                              
                                              
      
                                              <div class="modal fade" id="backDropModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                  <div class="modal-dialog">



                                                    <form class="modal-content" method="post" action="{{url('dashboard/backend/app-settings/edit')}}" enctype="multipart/form-data"> 
                                                      {{csrf_field()}}
                                                  <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit    <?php echo $d->code; ?></h5>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                      ></button>
                                                      
                                                    </button>

                                                  </div>


                                                    <div class="modal-body">


                                                      
                                                      
                                                        <div class="col mb-0" hidden>
                                                          <label for="nameBackdrop" class="form-label">Code</label>
                                                          <input
                                                            name="code"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Code"
                                                            value="<?php echo $d->code; ?>"
                                                            required
                                                          />
                                                        </div>
                                                        <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Content (En)</label>
                                                          <textarea
                                                            name="contents_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Content"
                                                            rows="5"
                                                            required
                                                          ><?php echo $d->contents_en; ?></textarea>
                                                        </div>
                                                        <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Content (Ar)</label>
                                                          <textarea
                                                            name="contents_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Content"
                                                            rows="5"
                                                            required
                                                          ><?php echo $d->contents_ar; ?></textarea>
                                                        </div>
                                                       
                                                      
                                                      
                                                    </div>

                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                      </button>
                                                      <button type="submit" class="btn btn-primary">Save</button>
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
                  
                  <form class="modal-content" method="post" action="{{url('dashboard/backend/app-settings/add')}}"  enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Add New Settings</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="col mb-0" >
                        <label for="nameBackdrop" class="form-label">Code</label>
                        <input
                          name="code"
                          type="text"
                          class="form-control"
                          placeholder="Enter Code"
                          required
                        />
                      </div>
                      <div class="col mb-0">
                        <label for="nameBackdrop" class="form-label">Content (En)</label>
                        <textarea
                          name="contents_en"
                          type="text"
                          class="form-control"
                          placeholder="Enter English Content"
                          rows="5"
                          required
                        ></textarea>
                      </div>
                      <div class="col mb-0">
                        <label for="nameBackdrop" class="form-label">Content (Ar)</label>
                        <textarea
                          name="contents_ar"
                          type="text"
                          class="form-control"
                          placeholder="Enter Arabic Content"
                          rows="5"
                          required
                        ></textarea>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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

<script>
  function readURL_(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.blah').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
  
  </body>
</html>
