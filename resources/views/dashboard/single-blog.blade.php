<!DOCTYPE html>


<?php 
$blog  = App\Models\Blog::find(Route::input('id'));

$d = $blog;
?>


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
              <h4 class="fw-bold"><a href="{{url("dashboard/blogs")}}">Blogs</a> / {{$blog->title_en}}</h4>


            <div class="page-content fade-in-up">
       
        
       
              <div class="ibox">
                  <div class="ibox-head" style=" text-align:right;">

                  </div>
                  <div class="ibox-body">
                   
                      @include('dashboard.shared.messages')     
      
                      <div class="card">
                        <h5 class="card-header">Blog Details
                           {{-- <span style="margin-left: 70%">
                          <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#backDropModal"
                            style="margin-bottom: 10px;"
                          >
                            Create
                          </button></span> --}}
                        </h5>
                        <hr style="margin: 0!important">

                        <div class="row">
                          <div class="col-md-6">

                      

                            <form class="card" method="post" action="{{url('dashboard/backend/blogs/edit')}}" enctype="multipart/form-data"> 
                              {{csrf_field()}}
                          <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                              <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit    <?php echo $d->title_en; ?></h5>
                
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
                              
                              
                            </div>

                            <div class="modal-footer">
                              
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                     




                          </div>

                          <div class="col-md-6">






                            <div class="card">
                              <h5 class="card-header">Current Blog Media <span style="margin-left: 40%">
                                <button
                                  type="button"
                                  class="btn btn-primary"
                                  data-bs-toggle="modal"
                                  data-bs-target="#backDropModal"
                                  style="margin-bottom: 10px;"
                                >
                                  Add
                                </button></span></h5>
                              <hr style="margin: 0!important">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                      
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
            
                                        <?php
                                            $data = \App\Models\BlogMedia::where('blog_id', '=', $blog->id)->orderBy('id' ,'desc')->get();
                                            foreach ($data as $d) { ?>
                                            <tr>
                                          
                                                <td><?php echo $d->id; ?></td>
                                                {{-- <td><?php echo $d->title_en ?></td>
                                                <td><?php echo $d->title_ar ?></td> --}}
                                                <td>
                                                  <img class="comp-icon" src="
                                                  <?php echo $d->buildIcon() ?>" />
                                                </td>
                                                
                                                
                                                <td>

                                                  <form method="post" action="{{url('dashboard/backend/blogs-media/delete')}}">
                                                    {{csrf_field()}}
                                                <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                <button class="btn btn-default btn-md dropdown-item" type="submit"
                                                   onclick="return confirm('Are you sure? ')"
        
                                                 data-toggle="tooltip" data-original-title="Delete">
                                                 {{-- <i class="fa fa-trash font-14"></i> --}}
                                                 <i class="bx bx-trash me-1"></i>Delete
                                                </button>
                                           
                                                 </form>
                                       
                                               
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

                        </div>

                      </div>
                  </div>
              </div>




              <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                  
                  <form class="modal-content" method="post" action="{{url('dashboard/backend/blogs-media/add')}}"  enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Add New Media</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="col mb-0" style="display: none;">
                        <label for="nameBackdrop" class="form-label">Blog</label>
                        <input
                          name="blog_id"
                          type="number"
                          class="form-control"
                          placeholder="Blog"
                          value="{{$blog->id}}"
                        />
                      </div>

                      <div class="col mb-0" style="display: none;">
                        <label for="nameBackdrop" class="form-label">Type</label>
                        <select name="media_type" class="form-control" required>
                          <option value="image" selected>Image</option>
                          <option value="video">Video</option>
                         </select>
                      </div>

                      <div class="col mb-0">
                        <label for="nameBackdrop" class="form-label">Media Image</label>
                        <input
                          name="image"
                          type="file"
                          class="form-control"
                          onchange="readURL(this);"
                          required
                        />
                        <img class="blah" />
                      </div>
                     
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button id="block_save_btn" type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>


            </div>



            <!-- / Content -->
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
