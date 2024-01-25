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
              <h4 class="fw-bold"> Blogs</h4>


            <div class="page-content fade-in-up">
       
        
       
              <div class="ibox">
                  <div class="ibox-head" style=" text-align:right;">

                  </div>
                  <div class="ibox-body">
                   
                      @include('dashboard.shared.messages')     
      
                      <div class="card">
                        <h5 class="card-header">Current Blogs <span style="margin-left: 70%">
                          <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#backDropModal"
                            style="margin-bottom: 10px;"
                          >
                            Create
                          </button></span></h5>
                        <hr style="margin: 0!important">
                      <div class="table-responsive text-nowrap">
                          <table class="table">
                              <thead>
                                  <tr>
                                
                                      <th>ID</th>
                                      <th>Title (English)</th>
                                      <th>Title (Arabic)</th>
                                      <th>Content (English)</th>
                                      <th>Content (Arabic)</th>
                                      {{-- <th>Image</th> --}}
                                      <th>Actions</th>
                              
                                  </tr>
                              </thead>
                              <tbody class="table-border-bottom-0">
      
                                  <?php
                                      $data = \App\Models\Blog::orderBy('id' ,'desc')->paginate(10);
                                      foreach ($data as $d) { ?>
                                      <tr>
                                    
                                          <td><?php echo $d->id; ?></td>
                                          <td><a href="{{"single-blog/"}}<?php echo $d->id; ?>"><?php echo $d->title_en ?></a></td>
                                          <td><a href="{{"single-blog/"}}<?php echo $d->id; ?>"><?php echo $d->title_ar ?></a></td>
                                          <td><a href="{{"single-blog/"}}<?php echo $d->id; ?>"><?php if (strlen(strip_tags($d->content_en)) > 150){ echo substr(strip_tags($d->content_en) ,0,150)."..";} else{echo strip_tags($d->content_en);}  ?></a></td>
                                          <td><a href="{{"single-blog/"}}<?php echo $d->id; ?>"><?php if (strlen(strip_tags($d->content_ar)) > 150){ echo substr(strip_tags($d->content_ar) ,0,150)."..";} else{echo strip_tags($d->content_ar);}  ?></a></td>
                                          {{-- <td>
                                            <img class="comp-icon" src="
                                            <?php echo $d->buildIcon() ?>" />
                                          </td> --}}
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

                                                    
                                   
                                                <form method="post" action="{{url('dashboard/backend/blogs/delete')}}">
                                                  {{csrf_field()}}
                                              <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                              <button class="btn btn-default btn-md dropdown-item" type="submit"
                                                 onclick="return confirm('Are you sure? ')"
      
                                               data-toggle="tooltip" data-original-title="Delete">
                                               {{-- <i class="fa fa-trash font-14"></i> --}}
                                               <i class="bx bx-trash me-1"></i>Delete
                                              </button>
                                         
                                               </form>
                                              </div></div>
                                              
                                              
      
                                              <div class="modal fade" id="backDropModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                  <div class="modal-dialog">



                                                    <form class="modal-content" method="post" action="{{url('dashboard/backend/blogs/edit')}}" enctype="multipart/form-data"> 
                                                      {{csrf_field()}}
                                                  <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit    <?php echo $d->title_en; ?></h5>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                      ></button>
                                                      
                                                    </button>

                                                  </div>


                                                    <div class="modal-body">


                                                      <div class="col mb-0" style="display: none;">
                                                        <label for="nameBackdrop" class="form-label">Type</label>
                                                        <select name="blog_type" class="form-control" required>
                                                          <option value="blog" <?php if($d->blog_type == "blog") echo "selected" ; ?>>Blog</option>
                                                          <option value="news" <?php if($d->blog_type == "news") echo "selected" ; ?>>News</option>
                                                         </select>
                                                      </div>


                                                      
                                                      
                                                        <div class="col mb-0" >
                                                          <label for="nameBackdrop" class="form-label">Title (En)</label>
                                                          <input
                                                            name="title_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Title"
                                                            value="<?php echo $d->title_en; ?>"
                                                            required
                                                          />
                                                        </div>
                                                        <div class="col mb-0" >
                                                          <label for="nameBackdrop" class="form-label">Title (Ar)</label>
                                                          <input
                                                            name="title_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Title"
                                                            value="<?php echo $d->title_ar; ?>"
                                                            required
                                                          />
                                                        </div>

                                                        <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Content (En)</label>
                                                          <textarea
                                                            name="content_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Content"
                                                            rows="5"
                                                            required
                                                          ><?php echo $d->content_en; ?></textarea>
                                                        </div>

                                                        <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Content (Ar)</label>
                                                          <textarea
                                                            name="content_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Content"
                                                            rows="5"
                                                            required
                                                          ><?php echo $d->content_ar; ?></textarea>
                                                        </div>

                                                        <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Blog Footer (En)</label>
                                                          <textarea
                                                            name="blog_footer_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Blog Footer"
                                                            rows="5"
                                                            required
                                                          ><?php echo $d->blog_footer_en; ?></textarea>
                                                        </div>

                                                        <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Blog Footer (Ar)</label>
                                                          <textarea
                                                            name="blog_footer_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Blog Footer"
                                                            rows="5"
                                                            required
                                                          ><?php echo $d->blog_footer_ar; ?></textarea>
                                                        </div>

                                                        <div class="col mb-0" >
                                                          <label for="nameBackdrop" class="form-label">Author (En)</label>
                                                          <input
                                                            name="author_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Author"
                                                            value="<?php echo $d->author_en; ?>"
                                                            required
                                                          />
                                                        </div>
                                                        <div class="col mb-0" >
                                                          <label for="nameBackdrop" class="form-label">Author (Ar)</label>
                                                          <input
                                                            name="author_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Author"
                                                            value="<?php echo $d->author_ar; ?>"
                                                            required
                                                          />
                                                        </div>

                                                        <div class="col mb-0" >
                                                          <label for="nameBackdrop" class="form-label">Publish Date</label>
                                                          <input
                                                            name="publish_date"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Publish Date"
                                                            value="<?php echo $d->publish_date; ?>"
                                                            required
                                                          />
                                                        </div>
                                                        
                                                        {{-- <div class="col mb-0">
                                                          <label for="nameBackdrop" class="form-label">Image</label>
                                                          <input
                                                            name="image"
                                                            type="file"
                                                            class="form-control"
                                                            onchange="readURL(this);"
                                                          />
                                                          <img class="blah"  src="<?php echo $d->buildIcon() ?>"/>
                                                        </div> --}}
                                                        
                                                       
                                                      
                                                      
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
                  
                  <form class="modal-content" method="post" action="{{url('dashboard/backend/blogs/add')}}"  enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Add New Blog</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">


                      <div class="col mb-0" style="display: none;">
                        <label for="nameBackdrop" class="form-label">Type</label>
                        <select name="blog_type" class="form-control" required>
                          <option value="blog" selected>Blog</option>
                          <option value="news">News</option>
                         </select>
                      </div>

                        <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">Title (En)</label>
                          <input
                            name="title_en"
                            type="text"
                            class="form-control"
                            placeholder="Enter English Title"
                            required
                          />
                        </div>

                        <div class="col mb-0" >
                          <label for="nameBackdrop" class="form-label">Title (Ar)</label>
                          <input
                            name="title_ar"
                            type="text"
                            class="form-control"
                            placeholder="Enter Arabic Title"
                            required
                          />
                        </div>

                        <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">Content (En)</label>
                          <textarea
                            name="content_en"
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
                            name="content_ar"
                            type="text"
                            class="form-control"
                            placeholder="Enter Arabic Content"
                            rows="5"
                            required
                          ></textarea>
                        </div>

                        <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">Blog Footer (En)</label>
                          <textarea
                            name="blog_footer_en"
                            type="text"
                            class="form-control"
                            placeholder="Enter English Blog Footer"
                            rows="5"
                            required
                          ></textarea>
                        </div>

                        <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">Blog Footer (Ar)</label>
                          <textarea
                            name="blog_footer_ar"
                            type="text"
                            class="form-control"
                            placeholder="Enter Arabic Blog Footer"
                            rows="5"
                            required
                          ></textarea>
                        </div>

                        <div class="col mb-0" >
                          <label for="nameBackdrop" class="form-label">Author (En)</label>
                          <input
                            name="author_en"
                            type="text"
                            class="form-control"
                            placeholder="Enter English Author"
                            required
                          />
                        </div>
                        <div class="col mb-0" >
                          <label for="nameBackdrop" class="form-label">Author (Ar)</label>
                          <input
                            name="author_ar"
                            type="text"
                            class="form-control"
                            placeholder="Enter Arabic Author"
                            required
                          />
                        </div>

                        <div class="col mb-0" >
                          <label for="nameBackdrop" class="form-label">Publish Date</label>
                          <input
                            name="publish_date"
                            type="text"
                            class="form-control"
                            placeholder="Enter Publish Date"
                            required
                          />
                        </div>
                      
                      {{-- <div class="col mb-0">
                        <label for="nameBackdrop" class="form-label">Image</label>
                        <input
                          name="image"
                          type="file"
                          class="form-control"
                          onchange="readURL(this);"
                          required
                        />
                        <img class="blah" />
                      </div> --}}
                      
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
  function readURL(input) {
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
