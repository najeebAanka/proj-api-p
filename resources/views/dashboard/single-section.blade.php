<!DOCTYPE html>


<?php 
$section  = App\Models\Section::find(Route::input('id'));

$d = $section;
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
              <h4 class="fw-bold"><a href="{{url("dashboard/sections")}}">Sections</a> / {{$section->title_en}}</h4>


            <div class="page-content fade-in-up">
       
        
       
              <div class="ibox">
                  <div class="ibox-head" style=" text-align:right;">

                  </div>
                  <div class="ibox-body">
                   
                      @include('dashboard.shared.messages')     
      
                      <div class="card">
                        <h5 class="card-header">Section Details
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
                          <div class="col-md-4" id="col_md_4">

                      

                            <form class="card" method="post" action="{{url('dashboard/backend/sections/edit')}}" enctype="multipart/form-data"> 
                              {{csrf_field()}}
                          <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                              <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit    <?php echo $d->title_en; ?></h5>
                
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
                                  <textarea
                                    id="subtitle_en1_<?php echo $d->id; ?>"
                                    name="subtitle_en"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter English Subtitle"
                                    rows="5"
                                  ><?php echo $d->subtitle_en; ?></textarea>
                                </div>
                                <div id="subtitle_ar1<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                  <label for="nameBackdrop" class="form-label">SubTitle (Ar)</label>
                                  <textarea
                                    id="subtitle_ar1_<?php echo $d->id; ?>"
                                    name="subtitle_ar"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Arabic Subtitle"
                                    rows="5"
                                  ><?php echo $d->subtitle_ar; ?></textarea>
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
                              
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                     




                          </div>

                          <div class="col-md-8" id="col_md_8">






                            <div class="card">
                              <h5 class="card-header">Current Blocks <span style="margin-left: 60%">
                                <button
                                  type="button"
                                  class="btn btn-primary"
                                  data-bs-toggle="modal"
                                  data-bs-target="#backDropModal"
                                  style="margin-bottom: 10px;"
                                  <?php if($d->section_type == "youtube_video") {echo "hidden";}?>
                                >
                                  Create
                                </button></span>
                              </h5>
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
                                            $data = \App\Models\Block::where('section_id', '=', $section->id)->orderBy('id' ,'desc')->get();
                                            foreach ($data as $d) { ?>
                                            <tr>
                                          
                                                <td><?php echo $d->id; ?></td>
                                                <td><?php echo $d->title_en ?></td>
                                                <td><?php echo $d->title_ar ?></td>
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
      
                                                          
                                         
                                                      <form method="post" action="{{url('dashboard/backend/blocks/delete')}}">
                                                        {{csrf_field()}}
                                                    <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                    <button class="btn btn-default btn-md dropdown-item" type="submit"
                                                       onclick="return confirm('Are you sure? ')"
            
                                                     data-toggle="tooltip" data-original-title="Delete"
                                                     <?php
                                                     $ddd = \App\Models\Section::where('id', '=', $d->section_id)->first();
                                                     if($ddd->section_type == "youtube_video") {echo "hidden";}?>
                                                     >
                                                     {{-- <i class="fa fa-trash font-14"></i> --}}
                                                     <i class="bx bx-trash me-1"></i>Delete
                                                    </button>
                                               
                                                     </form>
                                                    </div></div>
                                                    
                                                    
            
                                                    <div class="modal fade" id="backDropModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                                        <div class="modal-dialog">
      
      
      
                                                          <form class="modal-content" method="post" action="{{url('dashboard/backend/blocks/edit')}}" enctype="multipart/form-data"> 
                                                            {{csrf_field()}}
                                                        <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                            <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Edit   <?php echo $d->title_en; ?></h5>
                                                          <button
                                                              type="button"
                                                              class="btn-close"
                                                              data-bs-dismiss="modal"
                                                              aria-label="Close"
                                                            ></button>
                                                            
                                                          </button>
      
                                                        </div>
      
      
                                                          <div class="modal-body">
      
                                      
                                                              {{-- <div class="row g-2"> --}}
                                                                <div id="section_id<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Section</label>
                                                                  <input
                                                                    id="section_id_<?php echo $d->id; ?>"
                                                                    name="section_id"
                                                                    type="number"
                                                                    class="form-control"
                                                                    placeholder="Section"
                                                                    value="{{$section->id}}"
                                                                  />
                                                                </div>
                                                                <div id="title_en<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Title (En)</label>
                                                                  <input
                                                                    id="title_en_<?php echo $d->id; ?>"
                                                                    name="title_en"
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter English Title"
                                                                    value="<?php echo $d->title_en; ?>"
                                                                  />
                                                                </div>
                                                                <div id="title_ar<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Title (Ar)</label>
                                                                  <input
                                                                  id="title_ar_<?php echo $d->id; ?>"
                                                                    name="title_ar"
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter Arabic Title"
                                                                    value="<?php echo $d->title_ar; ?>"
                                                                  />
                                                                </div>
                                                              {{-- </div> --}}
                                                              {{-- <div class="row g-2"> --}}
                                                                <div id="subtitle_en<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">SubTitle (En)</label>
                                                                  <textarea
                                                                    id="subtitle_en_<?php echo $d->id; ?>"
                                                                    name="subtitle_en"
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter English Subtitle"
                                                                    rows="5"
                                                                  ><?php echo $d->subtitle_en; ?></textarea>
                                                                </div>
                                                                <div id="subtitle_ar<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">SubTitle (Ar)</label>
                                                                  <textarea
                                                                    id="subtitle_ar_<?php echo $d->id; ?>"
                                                                    name="subtitle_ar"
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter Arabic Subtitle"
                                                                    rows="5"
                                                                  ><?php echo $d->subtitle_ar; ?></textarea>
                                                                </div>
                                                              {{-- </div> --}}
                                                              {{-- <div class="row g-2"> --}}
                                                                <div id="publish_date<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Unit</label>
                                                                  <input
                                                                    id="publish_date_<?php echo $d->id; ?>"
                                                                    name="publish_date"
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="gram"
                                                                    value="<?php echo $d->publish_date; ?>"
                                                                  />
                                                                </div>
                                                                <div id="media_link_for_images_slider<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Media</label>
                                                                  <input
                                                                    id="media_link_for_images_slider_<?php echo $d->id; ?>"
                                                                    name="image1"
                                                                    type="file"
                                                                    class="form-control"
                                                                    onchange="readURL(this);"
                                                                  />
                                                                  <img class="blah" src="<?php echo $d->buildImage() ?>" />
                                                                </div>

                                                                <div id="media_link_for_gold_prices_slider<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Up / Down</label>
                                                                  <select id="media_link_for_gold_prices_slider_<?php echo $d->id; ?>" name="" class="form-control">
                                                                    <option value="up" <?php if($d->media_link == "up") echo "selected" ; ?>>Up</option>
                                                                    <option value="down" <?php if($d->media_link == "down") echo "selected" ; ?>>Down</option>
                                                                   </select>
                                                                </div>

                                                                <div id="media_link<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Youtube Video ID</label>
                                                                  <input
                                                                  id="media_link_<?php echo $d->id; ?>"
                                                                    name="media_link"
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter Youtube Video ID"
                                                                    value="<?php echo $d->media_link; ?>"
                                                                  />
                                                                </div>
                                                              {{-- </div> --}}
                                                              {{-- <div class="row g-2"> --}}
                                                                <div id="thumbnail<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Thumbnail</label>
                                                                  <input
                                                                    id="thumbnail_<?php echo $d->id; ?>"
                                                                    name="image"
                                                                    type="file"
                                                                    class="form-control"
                                                                    onchange="readURL(this);"
                                                                  />
                                                                  <img class="blah"  src="<?php echo $d->buildIcon() ?>"/>
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



                                                                {{-- <div id="target_type<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Target Type</label>
                                                                  <select id="target_type_<?php echo $d->id; ?>" name="target_type" class="form-control">
                                                                    <option value="article" <?php if($d->target_type == "article") echo "selected" ; ?>>Article</option>
                                                                    <option value="link" <?php if($d->target_type == "link") echo "selected" ; ?>>Link</option>
                                                                    <option value="market" <?php if($d->target_type == "market") echo "selected" ; ?>>Market</option>
                                                                   </select>
                                                                </div> --}}
                                                                {{-- <div id="target_id<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Target</label>
                                                                  <select id="target_id_<?php echo $d->id; ?>" name="target_id" class="form-control">
                                                                    <option value="blog" <?php if($d->target_id == "blog") echo "selected" ; ?>>Blog</option>
                                                                    <option value="link" <?php if($d->target_id == "link") echo "selected" ; ?>>Link</option>
                                                                    <option value="country" <?php if($d->target_id == "country") echo "selected" ; ?>>Country</option>
                                                                   </select>
                                                                </div> --}}



{{-- ------------------------------------------------------------------------------------------------------------------------- --}}



                                                                <div id="target_type<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Target Type</label>
                                                                  <select id="target_type_<?php echo $d->id; ?>" name="target_type" class="form-control">
                                                                    <option value="article" <?php if($d->target_type == "article") {echo "selected";} if($section->section_type == "gold_prices_slider"){echo " hidden";} ?>>Article</option>
                                                                    <option value="link" <?php if($d->target_type == "link") {echo "selected";} if($section->section_type == "gold_prices_slider"){echo " hidden";} ?>>Link</option>
                                                                    <option value="market" <?php if($d->target_type == "market") {echo "selected";}
                                                                     if($section->section_type == "images_slider" 
                                                                    || $section->section_type == "vertical_blocks_list" 
                                                                    || $section->section_type == "horizontal_blocks_list"
                                                                    ){echo " hidden";} ?>>Market</option>
                                                                  </select>
                                                                </div>

                                                                <div id="target_id_for_article<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Target</label>
                                                                  <select id="target_id_for_article_<?php echo $d->id; ?>" class="form-control">
                                                                    
                                                                    <?php
                                                                         $data_ = \App\Models\Blog::get();
                                                                         foreach ($data_ as $d_) { ?>
                                        
                                                                        <option value="<?php echo $d_->id; ?>" <?php if($d->target_id == $d_->id) echo "selected" ; ?>><?php echo $d_->title_en; ?></option>
                                        
                                                                        <?php
                                                                        }
                                                                          ?>
                                        
                                                                  </select>
                                                                </div>

                                                                <div id="target_id_for_link<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Target</label>
                                                                  <input
                                                                  id="target_id_for_link_<?php echo $d->id; ?>"
                                                                    
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="http://"
                                                                    value="<?php echo $d->target_id; ?>"
                                                                  />
                                                                </div>

                                                                <div id="target_id_for_market<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Target</label>
                                                                  <select id="target_id_for_market_<?php echo $d->id; ?>"  class="form-control">
                                                                    
                                                                    <?php
                                                                         $data__ = \App\Models\Country::get();
                                                                         foreach ($data__ as $d__) { ?>
                                        
                                                                        <option value="<?php echo $d__->id; ?>" <?php if($d->target_id == $d__->id) echo "selected" ; ?>><?php echo $d__->name_en; ?></option>
                                        
                                                                        <?php
                                                                        }
                                                                          ?>
                                        
                                                                   </select>
                                                                </div>



{{-- ---------------------------------------------------------------------------------------------------------------- --}}



                                                                <div id="status<?php echo $d->id; ?>" class="col mb-0" style="display: none;">
                                                                  <label for="nameBackdrop" class="form-label">Status</label>
                                                                  <select id="status_<?php echo $d->id; ?>" name="status" class="form-control">
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

                        </div>











                     
                      </div>
                  </div>
              </div>




              <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                  
                  <form class="modal-content" method="post" action="{{url('dashboard/backend/blocks/add')}}"  enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Create New Block</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      
                      {{-- <div class="col mb-0">
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
                      </div> --}}


                      <div id="gold_price_msg" class="col mb-0" style="display: none;">
                        <h4>Can not add blocks to this type of sections !</h4>
                      </div>


                      {{-- <div class="row g-2"> --}}
                        <div id="section_id" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Section</label>
                          <input
                            id="section_id_"
                            name="section_id"
                            type="number"
                            class="form-control"
                            placeholder="Section"
                            value="{{$section->id}}"
                          />
                        </div>
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
                          <label for="nameBackdrop" class="form-label">Unit</label>
                          <input
                            id="publish_date_"
                            name="publish_date"
                            type="text"
                            class="form-control"
                            placeholder="gram"
                          />
                        </div>
                        <div id="media_link_for_images_slider" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Media</label>
                          <input
                            id="media_link_for_images_slider_"
                            name="image1"
                            type="file"
                            class="form-control"
                            placeholder="Upload"
                            onchange="readURL(this);"
                          />
                          <img class="blah"  />
                        </div>
                        

                        <div id="media_link_for_gold_prices_slider" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Up / Down</label>
                          <select id="media_link_for_gold_prices_slider_" name="" class="form-control">
                            <option value="up" selected>Up</option>
                            <option value="down">Down</option>
                           </select>
                        </div>


                        <div id="media_link" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Youtube Video ID</label>
                          <input
                          id="media_link_"
                            name="media_link"
                            type="text"
                            class="form-control"
                            placeholder="Enter Youtube Video ID"
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
                            onchange="readURL(this);"
                          />
                          <img class="blah"  />
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
                        <div id="target_type" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Target Type</label>
                          <select id="target_type_" name="target_type" class="form-control">
                            <option value="" disabled selected style="display:none">Select Target Type</option>
                            <option value="article" <?php if($section->section_type == "gold_prices_slider"){echo " hidden";} ?> >Article</option>
                            <option value="link" <?php if($section->section_type == "gold_prices_slider"){echo " hidden";} ?> >Link</option>
                            <option value="market" 
                           <?php if($section->section_type == "images_slider" 
                                 || $section->section_type == "vertical_blocks_list" 
                                 || $section->section_type == "horizontal_blocks_list"){echo " hidden";} ?>

                            >Market</option>
                           </select>
                        </div>
                        <div id="target_id_for_article" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Target</label>
                          <select id="target_id_for_article_" class="form-control">
                            
                            <?php
                                 $data_ = \App\Models\Blog::get();
                                 foreach ($data_ as $d) { ?>

                                <option value="<?php echo $d->id; ?>"><?php echo $d->title_en; ?></option>

                                <?php
                                }
                                  ?>

                           </select>
                        </div>
                        <div id="target_id_for_link" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Target</label>
                          <input
                          id="target_id_for_link_"
                            
                            type="text"
                            class="form-control"
                            placeholder="http://"
                          />
                        </div>
                        <div id="target_id_for_market" class="col mb-0" style="display: none;">
                          <label for="nameBackdrop" class="form-label">Target</label>
                          <select id="target_id_for_market_"  class="form-control">
                            
                            <?php
                                 $data_ = \App\Models\Country::get();
                                 foreach ($data_ as $d) { ?>

                                <option value="<?php echo $d->id; ?>"><?php echo $d->name_en; ?></option>

                                <?php
                                }
                                  ?>

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
                      <button id="block_save_btn" type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
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
  


<script>

<?php
         $data = \App\Models\Section::orderBy('id' ,'desc')->get();
              foreach ($data as $d) { ?>

                
                document.addEventListener('DOMContentLoaded', function() {
    //alert("Ready!");


// $('#backDropModal<?php echo $d->id; ?>').on('shown.bs.modal', function (e) {



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

  document.querySelector('#col_md_8').style.display = 'none';
  document.getElementById("col_md_4").className = "";

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = tru;
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
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = tru;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }

  if (document.getElementById("test1<?php echo $d->id; ?>").value == "youtube_video") {
  document.querySelector('#title_en1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#section_model1<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status1<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("title_en1_<?php echo $d->id; ?>").required = true;
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = tru;
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
    document.getElementById("title_ar1_<?php echo $d->id; ?>").required = tru;
    document.getElementById("col_count1_<?php echo $d->id; ?>").required = true;
    document.getElementById("section_model1_<?php echo $d->id; ?>").required = true;
    document.getElementById("status1_<?php echo $d->id; ?>").required = true;
  }


// })
        

}, false);

<?php
      }
?>


</script>



<script>


  $('#backDropModal').on('shown.bs.modal', function (e) {
  

    document.querySelector('#title_en').style.display = 'none';
    document.querySelector('#title_ar').style.display = 'none';
    document.querySelector('#subtitle_en').style.display = 'none';
    document.querySelector('#subtitle_ar').style.display = 'none';
    document.querySelector('#publish_date').style.display = 'none';
    document.querySelector('#thumbnail').style.display = 'none';
    document.querySelector('#media_link').style.display = 'none';
    document.querySelector('#target_type').style.display = 'none';
    // document.querySelector('#target_id').style.display = 'none';
    document.querySelector('#status').style.display = 'none';
    document.querySelector('#media_link_for_images_slider').style.display = 'none';
    document.querySelector('#media_link_for_gold_prices_slider').style.display = 'none';
    

    document.getElementById("title_en_").required = false;
    document.getElementById("title_ar_").required = false;
    document.getElementById("subtitle_en_").required = false;
    document.getElementById("subtitle_ar_").required = false;
    document.getElementById("publish_date_").required = false;
    document.getElementById("thumbnail_").required = false;
    document.getElementById("media_link_").required = false;
    document.getElementById("target_type_").required = false;
    // document.getElementById("target_id_").required = false;
    document.getElementById("status_").required = false;
    document.getElementById("media_link_for_images_slider_").required = false;
    document.getElementById("media_link_for_gold_prices_slider").required = false;


@if($section->section_type == "gold_prices_slider")
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#subtitle_en').style.display = 'block';
    document.querySelector('#subtitle_ar').style.display = 'block';
    document.querySelector('#thumbnail').style.display = 'block';
    document.querySelector('#publish_date').style.display = 'block';
    document.querySelector('#media_link_for_gold_prices_slider').style.display = 'block';
    document.querySelector('#target_type').style.display = 'block';
    // document.querySelector('#target_id').style.display = 'block';
    document.querySelector('#status').style.display = 'none';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("subtitle_en_").required = true;
    document.getElementById("subtitle_ar_").required = true;
    document.getElementById("thumbnail_").required = true;
    document.getElementById("publish_date_").required = true;
    document.getElementById("media_link_for_gold_prices_slider_").required = true;
    document.getElementById("target_type_").required = true;
    // document.getElementById("target_id_").required = true;
    document.getElementById("status_").required = false;

    document.getElementById("media_link_for_gold_prices_slider_").setAttribute("name","media_link");
    document.getElementById("media_link_").setAttribute("name","");

@endif

@if($section->section_type == "gold_price")


    document.querySelector('#gold_price_msg').style.display = 'block';
    document.querySelector('#block_save_btn').style.display = 'none';
    

@endif

@if($section->section_type == "images_slider")
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    // document.querySelector('#subtitle_en').style.display = 'block';
    // document.querySelector('#subtitle_ar').style.display = 'block';
    document.querySelector('#media_link_for_images_slider').style.display = 'block';
    document.querySelector('#target_type').style.display = 'block';
    // document.querySelector('#target_id').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    // document.getElementById("subtitle_en_").required = true;
    // document.getElementById("subtitle_ar_").required = true;
    document.getElementById("media_link_for_images_slider_").required = true;
    document.getElementById("target_type_").required = true;
    // document.getElementById("target_id_").required = true;
    document.getElementById("status_").required = true;

@endif

@if($section->section_type == "vertical_blocks_list")
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#subtitle_en').style.display = 'block';
    document.querySelector('#subtitle_ar').style.display = 'block';
    document.querySelector('#thumbnail').style.display = 'block';
    document.querySelector('#target_type').style.display = 'block';
    // document.querySelector('#target_id').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("subtitle_en_").required = true;
    document.getElementById("subtitle_ar_").required = true;
    document.getElementById("thumbnail_").required = true;
    document.getElementById("target_type_").required = true;
    // document.getElementById("target_id_").required = true;
    document.getElementById("status_").required = true;

@endif

@if($section->section_type == "youtube_video")
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#media_link').style.display = 'block';
    document.querySelector('#target_type').style.display = 'block';
    // document.querySelector('#target_id').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("media_link_").required = true;
    document.getElementById("target_type_").required = true;
    // document.getElementById("target_id_").required = true;
    document.getElementById("status_").required = true;

@endif

@if($section->section_type == "horizontal_blocks_list")
    document.querySelector('#title_en').style.display = 'block';
    document.querySelector('#title_ar').style.display = 'block';
    document.querySelector('#thumbnail').style.display = 'block';
    document.querySelector('#target_type').style.display = 'block';
    // document.querySelector('#target_id').style.display = 'block';
    document.querySelector('#status').style.display = 'block';

    document.getElementById("title_en_").required = true;
    document.getElementById("title_ar_").required = true;
    document.getElementById("thumbnail_").required = true;
    document.getElementById("target_type_").required = true;
    // document.getElementById("target_id_").required = true;
    document.getElementById("status_").required = true;

@endif

})


</script>




<script>

  <?php
         $data = \App\Models\Block::orderBy('id' ,'desc')->get();
              foreach ($data as $d) { ?>

$('#backDropModal<?php echo $d->id; ?>').on('shown.bs.modal', function (e) {


  document.querySelector('#title_en<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#title_ar<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#subtitle_en<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#subtitle_ar<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#publish_date<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#thumbnail<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#media_link<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_type<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#status<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#media_link_for_images_slider<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#media_link_for_gold_prices_slider<?php echo $d->id; ?>').style.display = 'none';

  document.getElementById("title_en_<?php echo $d->id; ?>").required = false;
  document.getElementById("title_ar_<?php echo $d->id; ?>").required = false;
  document.getElementById("subtitle_en_<?php echo $d->id; ?>").required = false;
  document.getElementById("subtitle_ar_<?php echo $d->id; ?>").required = false;
  document.getElementById("publish_date_<?php echo $d->id; ?>").required = false;
  document.getElementById("thumbnail_<?php echo $d->id; ?>").required = false;
  document.getElementById("media_link_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_type_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = false;
  document.getElementById("status_<?php echo $d->id; ?>").required = false;
  document.getElementById("media_link_for_images_slider_<?php echo $d->id; ?>").required = false;
  document.getElementById("media_link_for_gold_prices_slider_<?php echo $d->id; ?>").required = false;






@if($d->target_type == "article")
  document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'none';

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").setAttribute("name","target_id");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").setAttribute("name","");

  document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = false;
@endif

@if($d->target_type == "link")
  document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'none';

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("name","target_id");
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").setAttribute("name","");

  document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = false;
@endif

@if($d->target_type == "market")
  document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'none';
  document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").setAttribute("name","target_id");

  document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = false;
  document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = true;
@endif



@if($section->section_type == "gold_prices_slider")
  document.querySelector('#title_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#thumbnail<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#publish_date<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#media_link_for_gold_prices_slider<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_type<?php echo $d->id; ?>').style.display = 'block';
  // document.querySelector('#target_id<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status<?php echo $d->id; ?>').style.display = 'block';

  document.getElementById("title_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("title_ar_<?php echo $d->id; ?>").required = true;
  document.getElementById("subtitle_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("subtitle_ar_<?php echo $d->id; ?>").required = true;
  // document.getElementById("thumbnail_<?php echo $d->id; ?>").required = true;
  document.getElementById("publish_date_<?php echo $d->id; ?>").required = true;
  document.getElementById("media_link_for_gold_prices_slider_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_type_<?php echo $d->id; ?>").required = true;
  // document.getElementById("target_id_<?php echo $d->id; ?>").required = true;
  document.getElementById("status_<?php echo $d->id; ?>").required = true;

  document.getElementById("media_link_for_gold_prices_slider_<?php echo $d->id; ?>").setAttribute("name","media_link");
    document.getElementById("media_link_<?php echo $d->id; ?>").setAttribute("name","");

@endif

// @if($section->section_type == "gold_price")


//   document.querySelector('#gold_price_msg').style.display = 'block';
//   document.querySelector('#block_save_btn').style.display = 'none';
  

// @endif

@if($section->section_type == "images_slider")
  document.querySelector('#title_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#media_link_for_images_slider<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_type<?php echo $d->id; ?>').style.display = 'block';
  // document.querySelector('#target_id<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status<?php echo $d->id; ?>').style.display = 'block';

  document.getElementById("title_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("title_ar_<?php echo $d->id; ?>").required = true;
  document.getElementById("subtitle_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("subtitle_ar_<?php echo $d->id; ?>").required = true;
  // document.getElementById("media_link_for_images_slider_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_type_<?php echo $d->id; ?>").required = true;
  // document.getElementById("target_id_<?php echo $d->id; ?>").required = true;
  document.getElementById("status_<?php echo $d->id; ?>").required = true;

@endif

@if($section->section_type == "vertical_blocks_list")
  document.querySelector('#title_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#subtitle_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#thumbnail<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_type<?php echo $d->id; ?>').style.display = 'block';
  // document.querySelector('#target_id<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status<?php echo $d->id; ?>').style.display = 'block';

  document.getElementById("title_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("title_ar_<?php echo $d->id; ?>").required = true;
  document.getElementById("subtitle_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("subtitle_ar_<?php echo $d->id; ?>").required = true;
  // document.getElementById("thumbnail_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_type_<?php echo $d->id; ?>").required = true;
  // document.getElementById("target_id_<?php echo $d->id; ?>").required = true;
  document.getElementById("status_<?php echo $d->id; ?>").required = true;

@endif

@if($section->section_type == "youtube_video")
  document.querySelector('#title_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#media_link<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_type<?php echo $d->id; ?>').style.display = 'none';
  // document.querySelector('#target_id<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'none'
  document.querySelector('#status<?php echo $d->id; ?>').style.display = 'block';

  document.getElementById("title_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("title_ar_<?php echo $d->id; ?>").required = true;
  document.getElementById("media_link_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_type_<?php echo $d->id; ?>").required = false;
  // document.getElementById("target_id_<?php echo $d->id; ?>").required = true;
  document.getElementById("status_<?php echo $d->id; ?>").required = true;

@endif

@if($section->section_type == "horizontal_blocks_list")
  document.querySelector('#title_en<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#title_ar<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#thumbnail<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#target_type<?php echo $d->id; ?>').style.display = 'block';
  // document.querySelector('#target_id<?php echo $d->id; ?>').style.display = 'block';
  document.querySelector('#status<?php echo $d->id; ?>').style.display = 'block';

  document.getElementById("title_en_<?php echo $d->id; ?>").required = true;
  document.getElementById("title_ar_<?php echo $d->id; ?>").required = true;
  // document.getElementById("thumbnail_<?php echo $d->id; ?>").required = true;
  document.getElementById("target_type_<?php echo $d->id; ?>").required = true;
  // document.getElementById("target_id_<?php echo $d->id; ?>").required = true;
  document.getElementById("status_<?php echo $d->id; ?>").required = true;

@endif





var el = document.getElementById("target_type_<?php echo $d->id; ?>");
el.addEventListener("change", function() {



  if (this.value == "article") {
    document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'block';
    document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'none';

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").setAttribute("name","target_id");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").setAttribute("name","");
    

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = true;
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = false;
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = false;


 } else if (this.value == "link") {
    document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'block';
    document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'none';

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("name","target_id");
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("value","");
    

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = false;
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = true;
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = false;
 }else if (this.value == "market") {
    document.querySelector('#target_id_for_article<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#target_id_for_link<?php echo $d->id; ?>').style.display = 'none';
    document.querySelector('#target_id_for_market<?php echo $d->id; ?>').style.display = 'block';

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").setAttribute("name","");
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").setAttribute("name","target_id");
    

    document.getElementById("target_id_for_article_<?php echo $d->id; ?>").required = false;
    document.getElementById("target_id_for_link_<?php echo $d->id; ?>").required = false;
    document.getElementById("target_id_for_market_<?php echo $d->id; ?>").required = true;
  }
}, false);







})

<?php
}
?>


</script>


  
<script>

var el = document.getElementById("target_type_");
el.addEventListener("change", function() {



  if (this.value == "article") {
    document.querySelector('#target_id_for_article').style.display = 'block';
    document.querySelector('#target_id_for_link').style.display = 'none';
    document.querySelector('#target_id_for_market').style.display = 'none';

    document.getElementById("target_id_for_article_").setAttribute("name","target_id");
    document.getElementById("target_id_for_link_").setAttribute("name","");
    document.getElementById("target_id_for_market_").setAttribute("name","");
    

    document.getElementById("target_id_for_article_").required = true;
    document.getElementById("target_id_for_link_").required = false;
    document.getElementById("target_id_for_market_").required = false;

 } else if (this.value == "link") {
    document.querySelector('#target_id_for_article').style.display = 'none';
    document.querySelector('#target_id_for_link').style.display = 'block';
    document.querySelector('#target_id_for_market').style.display = 'none';

    document.getElementById("target_id_for_article_").setAttribute("name","");
    document.getElementById("target_id_for_link_").setAttribute("name","target_id");
    document.getElementById("target_id_for_market_").setAttribute("name","");
    

    document.getElementById("target_id_for_article_").required = false;
    document.getElementById("target_id_for_link_").required = true;
    document.getElementById("target_id_for_market_").required = false;
 }else if (this.value == "market") {
    document.querySelector('#target_id_for_article').style.display = 'none';
    document.querySelector('#target_id_for_link').style.display = 'none';
    document.querySelector('#target_id_for_market').style.display = 'block';

    document.getElementById("target_id_for_article_").setAttribute("name","");
    document.getElementById("target_id_for_link_").setAttribute("name","");
    document.getElementById("target_id_for_market_").setAttribute("name","target_id");
    

    document.getElementById("target_id_for_article_").required = false;
    document.getElementById("target_id_for_link_").required = false;
    document.getElementById("target_id_for_market_").required = true;
  }
}, false);

</script>








  </body>
</html>
