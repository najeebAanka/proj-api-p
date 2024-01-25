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
              <h4 class="fw-bold"> Sections</h4>


            <div class="page-content fade-in-up">
       
        
       
              <div class="ibox">
                  <div class="ibox-head" style=" text-align:right;">

                  </div>
                  <div class="ibox-body">
                   
                      @include('dashboard.shared.messages')     
      
                      <div class="card">
                        <h5 class="card-header">Current Sections <span style="margin-left: 70%">
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
                                      {{-- <th>Image</th> --}}
                                      <th>Actions</th>
                              
                                  </tr>
                              </thead>
                              <tbody class="table-border-bottom-0">
      
                                  <?php
                                      $data = \App\Models\Section::orderBy('id' ,'desc')->paginate(10);
                                      foreach ($data as $d) { ?>
                                      <tr>
                                    
                                          <td><?php echo $d->id; ?></td>
                                          <td><a href="{{"single-section/"}}<?php echo $d->id; ?>"><?php echo $d->title_en ?></a></td>
                                          <td><a href="{{"single-section/"}}<?php echo $d->id; ?>"><?php echo $d->title_ar ?></a></td>
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

                                                    
                                   
                                                <form method="post" action="{{url('dashboard/backend/sections/delete')}}">
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



                                                    <form class="modal-content" method="post" action="{{url('dashboard/backend/sections/edit')}}" enctype="multipart/form-data"> 
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
                                                        <select id="test1<?php echo $d->id; ?>" name="section_type" class="form-control">
                                                          <option value="gold_prices_slider" <?php if($d->section_type == "gold_prices_slider") echo "selected" ; ?>>Gold Prices Slider</option>
                                                          <option value="gold_price" <?php if($d->section_type == "gold_price") echo "selected" ; ?>>Gold Price</option>
                                                          <option value="images_slider" <?php if($d->section_type == "images_slider") echo "selected" ; ?>>Images Slider</option>
                                                          <option value="vertical_blocks_list" <?php if($d->section_type == "vertical_blocks_list") echo "selected" ; ?>>Vertical Blocks List</option>
                                                          <option value="youtube_video" <?php if($d->section_type == "youtube_video") echo "selected" ; ?>>Youtube Video</option>
                                                          <option value="horizontal_blocks_list" <?php if($d->section_type == "horizontal_blocks_list") echo "selected" ; ?>>Horizontal Blocks List</option>
                                                         </select>
                                                      </div>
                                                      
                                                        <div id="title_en1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Title (En)</label>
                                                          <input
                                                            id="title_en1_<?php echo $d->id; ?>"
                                                            name="title_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Title"
                                                            value="<?php echo $d->title_en; ?>"
                                                          />
                                                        </div>
                                                        <div id="title_ar1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Title (Ar)</label>
                                                          <input
                                                            id="title_ar1_<?php echo $d->id; ?>"
                                                            name="title_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Title"
                                                            value="<?php echo $d->title_ar; ?>"
                                                          />
                                                        </div>
                                                        <div id="subtitle_en1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">SubTitle (En)</label>
                                                          {{-- <textarea
                                                            id="subtitle_en1_<?php echo $d->id; ?>"
                                                            name="subtitle_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Subtitle"
                                                            rows="5"
                                                          ><?php echo $d->subtitle_en; ?></textarea> --}}
                                                          <input
                                                            id="subtitle_en1_<?php echo $d->id; ?>"
                                                            name="subtitle_en"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter English Subtitle"
                                                            value="<?php echo $d->subtitle_en; ?>"
                                                          />
                                                        </div>
                                                        <div id="subtitle_ar1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">SubTitle (Ar)</label>
                                                          {{-- <textarea
                                                            id="subtitle_ar1_<?php echo $d->id; ?>"
                                                            name="subtitle_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Subtitle"
                                                            rows="5"
                                                          ><?php echo $d->subtitle_ar; ?></textarea> --}}
                                                          <input
                                                            id="subtitle_ar1_<?php echo $d->id; ?>"
                                                            name="subtitle_ar"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Enter Arabic Subtitle"
                                                            value="<?php echo $d->subtitle_ar; ?>"
                                                          />
                                                        </div>
                                                        <div id="publish_date1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Publish Date</label>
                                                          <input
                                                            id="publish_date1_<?php echo $d->id; ?>"
                                                            name="publish_date"
                                                            type="date"
                                                            class="form-control"
                                                            placeholder="Enter Publish Date"
                                                            value="<?php echo $d->publish_date; ?>"
                                                          />
                                                        </div>
                                                        <div id="col_count1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Colomns Count</label>
                                                          <input
                                                            id="col_count1_<?php echo $d->id; ?>"
                                                            name="col_count"
                                                            type="number"
                                                            class="form-control"
                                                            placeholder="Enter Colomns Count"
                                                            value="<?php echo $d->col_count; ?>"
                                                          />
                                                        </div>
                                                        <div id="thumbnail1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Thumbnail</label>
                                                          <input
                                                            id="thumbnail1_<?php echo $d->id; ?>"
                                                            name="image"
                                                            type="file"
                                                            class="form-control"
                                                            placeholder="Upload"
                                                          />
                                                        </div>
                                                        {{-- <div class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Type</label>
                                                          <select name="section_type" class="form-control">
                                                            <option value="gold_prices_slider" <?php if($d->section_type == "gold_prices_slider") echo "selected" ; ?>>Gold Prices Slider</option>
                                                            <option value="gold_price" <?php if($d->section_type == "gold_price") echo "selected" ; ?>>Gold Price</option>
                                                            <option value="images_slider" <?php if($d->section_type == "images_slider") echo "selected" ; ?>>Images Slider</option>
                                                            <option value="vertical_blocks_list" <?php if($d->section_type == "vertical_blocks_list") echo "selected" ; ?>>Vertical Blocks List</option>
                                                            <option value="youtube_video" <?php if($d->section_type == "youtube_video") echo "selected" ; ?>>Youtube Video</option>
                                                            <option value="horizontal_blocks_list" <?php if($d->section_type == "horizontal_blocks_list") echo "selected" ; ?>>Horizontal Blocks List</option>
                                                           </select>
                                                        </div> --}}
                                                        <div id="section_model1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Model</label>
                                                          <select id="section_model1_<?php echo $d->id; ?>" name="section_model" class="form-control">
                                                            <option value="news" <?php if($d->section_model == "news") echo "selected" ; ?>>News</option>
                                                            <option value="blog" <?php if($d->section_model == "blog") echo "selected" ; ?>>Blogs</option>
                                                           </select>
                                                        </div>
                                                        <div id="status1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                          <label for="nameBackdrop" class="form-label">Status</label>
                                                          <select id="status1_<?php echo $d->id; ?>" name="status" class="form-control">
                                                            <option value="0" <?php if($d->status == "0") echo "selected" ; ?>>Unpublished</option>
                                                            <option value="1" <?php if($d->status == "1") echo "selected" ; ?>>Published</option>
                                                           </select>
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
                  
                  <form class="modal-content" method="post" action="{{url('dashboard/backend/sections/add')}}"  enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Create new section</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="col mb-0">
                        <label for="nameBackdrop" class="form-label">Type</label>
                        <select id="test" name="section_type" class="form-control" required>
                          <option value="" disabled selected style="display:none">Select Section Type</option>
                          <option value="gold_prices_slider">Gold Prices Slider</option>
                          <option value="gold_price">Gold Price</option>
                          <option value="images_slider">Images Slider</option>
                          <option value="vertical_blocks_list">Vertical Blocks List</option>
                          <option value="youtube_video">Youtube Video</option>
                          <option value="horizontal_blocks_list">Horizontal Blocks List</option>
                         </select>
                      </div>

                      {{-- <div class="row g-2"> --}}
                        <div id="title_en" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Title (En)</label>
                          <input
                            id="title_en_"
                            name="title_en"
                            type="text"
                            class="form-control"
                            placeholder="Enter English Title"
                          />
                        </div>
                        <div id="title_ar" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Title (Ar)</label>
                          <input
                          id="title_ar_"
                            name="title_ar"
                            type="text"
                            class="form-control"
                            placeholder="Enter Arabic Title"
                          />
                        </div>
                      {{-- </div> --}}
                      {{-- <div class="row g-2"> --}}
                        <div id="subtitle_en" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">SubTitle (En)</label>
                          <textarea
                            id="subtitle_en_"
                            name="subtitle_en"
                            type="text"
                            class="form-control"
                            placeholder="Enter English Subtitle"
                            rows="5"
                          ></textarea>
                        </div>
                        <div id="subtitle_ar" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">SubTitle (Ar)</label>
                          <textarea
                            id="subtitle_ar_"
                            name="subtitle_ar"
                            type="text"
                            class="form-control"
                            placeholder="Enter Arabic Subtitle"
                            rows="5"
                          ></textarea>
                        </div>
                      {{-- </div> --}}
                      {{-- <div class="row g-2"> --}}
                        <div id="publish_date" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Publish Date</label>
                          <input
                            id="publish_date_"
                            name="publish_date"
                            type="date"
                            class="form-control"
                            placeholder="Enter Publish Date"
                          />
                        </div>
                        <div id="col_count" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Colomns Count</label>
                          <input
                          id="col_count_"
                            name="col_count"
                            type="number"
                            class="form-control"
                            placeholder="Enter Colomns Count"
                            value="1"
                          />
                        </div>
                      {{-- </div> --}}
                      {{-- <div class="row g-2"> --}}
                        <div id="thumbnail" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Thumbnail</label>
                          <input
                            id="thumbnail_"
                            name="image"
                            type="file"
                            class="form-control"
                            placeholder="Upload"
                            onchange="readURL_(this);"
                          />
                          {{-- <img class="blah"  /> --}}
                        </div>
                        {{-- <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">Type</label>
                          <select name="section_type" class="form-control">
                            <option value="gold_prices_slider" selected>Gold Prices Slider</option>
                            <option value="gold_price">Gold Price</option>
                            <option value="images_slider">Images Slider</option>
                            <option value="vertical_blocks_list">Vertical Blocks List</option>
                            <option value="youtube_video">Youtube Video</option>
                            <option value="horizontal_blocks_list">Horizontal Blocks List</option>
                           </select>
                        </div> --}}
                      {{-- </div> --}}
                      {{-- <div class="row g-2"> --}}
                        <div id="section_model" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Model</label>
                          <select id="section_model_" name="section_model" class="form-control">
                            <option value="news" selected>News</option>
                            <option value="blog">Blogs</option>
                           </select>
                        </div>
                        <div id="status" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Status</label>
                          <select id="status_" name="status" class="form-control">
                            <option value="0" selected>Unpublished</option>
                            <option value="1">Published</option>
                           </select>
                        </div>
                      {{-- </div> --}}
                      <div class="row">
                        <div class="col mb-3">
                          
                        </div>
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
  
<script>

var el = document.getElementById("test");
el.addEventListener("change", function() {
  
  // var elems = document.querySelectorAll('#title_en,#title_ar,#subtitle_en,#subtitle_ar
  // ,#publish_date,#thumbnail,#col_count,#status,#section_model')
  // for (var i = 0; i < elems.length; i++) {
  //   elems[i].style.display = 'none'
  // }

    //var elements = document.getElementsByClassName("test");

    document.querySelector('#title_en').style.display = 'none';
    document.querySelector('#title_ar').style.display = 'none';
    document.querySelector('#subtitle_en').style.display = 'none';
    document.querySelector('#subtitle_ar').style.display = 'none';
    document.querySelector('#publish_date').style.display = 'none';
    document.querySelector('#thumbnail').style.display = 'none';
    document.querySelector('#col_count').style.display = 'none';
    document.querySelector('#section_model').style.display = 'none';
    document.querySelector('#status').style.display = 'none';

    document.getElementById("title_en_").required = false;
    document.getElementById("title_ar_").required = false;
    document.getElementById("subtitle_en_").required = false;
    document.getElementById("subtitle_ar_").required = false;
    document.getElementById("publish_date_").required = false;
    document.getElementById("thumbnail_").required = false;
    document.getElementById("col_count_").required = false;
    document.getElementById("section_model_").required = false;
    document.getElementById("status_").required = false;

  if (this.value == "gold_prices_slider") {
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#section_model').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("section_model_").required = true;
    document.getElementById("status_").required = true;

 } else if (this.value == "gold_price") {
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#subtitle_en').style.display = 'block';
    document.querySelector('#subtitle_ar').style.display = 'block';
    document.querySelector('#section_model').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("subtitle_en_").required = true;
    document.getElementById("subtitle_ar_").required = true;
    document.getElementById("section_model_").required = true;
    document.getElementById("status_").required = true;
 }else if (this.value == "images_slider") {
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#section_model').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("section_model_").required = true;
    document.getElementById("status_").required = true;
  }else if (this.value == "vertical_blocks_list") {
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#section_model').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("section_model_").required = true;
    document.getElementById("status_").required = true;
  }else if (this.value == "youtube_video") {
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#section_model').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("section_model_").required = true;
    document.getElementById("status_").required = true;
  }else if (this.value == "horizontal_blocks_list") {
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#section_model').style.display = 'block';
    document.querySelector('#status').style.display = 'block';
    document.querySelector('#col_count').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("section_model_").required = true;
    document.getElementById("status_").required = true;
    document.getElementById("col_count_").required = true;
  }
}, false);

</script>

<script>

<?php
         $data = \App\Models\Section::orderBy('id' ,'desc')->get();
              foreach ($data as $d) { ?>

$('#backDropModal<?php echo $d->id; ?>').on('shown.bs.modal', function (e) {


//-----------------------------------------
    document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#subtitle_en1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#subtitle_ar1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#publish_date1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#thumbnail1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#col_count1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'none';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = false;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = false;
    document.getElementById("subtitle_en1_<?php echo $d->id; ?>").required = false;
    document.getElementById("subtitle_ar1_<?php echo $d->id; ?>").required = false;
    document.getElementById("publish_date1_<?php echo $d->id; ?>").required = false;
    document.getElementById("thumbnail1_<?php echo $d->id; ?>").required = false;
    document.getElementById("col_count1_<?php echo $d->id; ?>").required = false;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = false;
    document.getElementById("status1_<?php echo $d->id; ?>").required = false;


  
  if (document.getElementById("test1<?php echo $d->id; ?>").value == "gold_prices_slider") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';
  
    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }

  if (document.getElementById("test1<?php echo $d->id; ?>").value == "gold_price") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("subtitle_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("subtitle_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }

  if (document.getElementById("test1<?php echo $d->id; ?>").value == "images_slider") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }

  if (document.getElementById("test1<?php echo $d->id; ?>").value == "vertical_blocks_list") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }

  if (document.getElementById("test1<?php echo $d->id; ?>").value == "youtube_video") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }

  if (document.getElementById("test1<?php echo $d->id; ?>").value == "horizontal_blocks_list") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#col_count1<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = true;
    document.getElementById("col_count1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }


})


<?php
      }
?>

</script>


  </body>
</html>
