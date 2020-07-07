@extends('layouts.front_design')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content">
                    <h1>i am <br>
                        <span class="basecolor">Professional</span> <br> 
                    Photographer</h1>
                    <p>Upload any Picture and Edit it..</p>

                    <a class="main_btn" data-toggle="modal" data-target="#exampleModal">Upload Picture</a>

                </div>
            </div>
        </div>

        <div class="social_area">
            <h4>
                <a href="#"><i class="ti-instagram"></i>Instagram</a>
            </h4>
            <div class="round"></div>
            <h4>
                <a class="twitter" href="#"><i class="ti-twitter"></i>Twitter</a>
            </h4>
            <div class="round"></div>
            <h4>
                <a href="#"><i class="ti-facebook"></i>Facebook</a>
            </h4>
            <div></div>
        </div>
    </section>
 <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload a Picture</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" id="addpicture" class="form-horizontal" method="post" action="/addpicture">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                    <label for="event" class="col-sm-8 col-form-label">Add an Event/Select already created event</label>
                    <input type="text" name="name" id="name" placeholder="What is the the event??"
                        class="form-control" >
                        <br>
                    <select  name="event_id" class="form-control">
                        <?php echo $events_dropdown; ?>
                    </select>                      
                </div>
                 <div class="form-group">
                    <label for="address" class="col-sm-8 col-form-label">add a new Place/select an existing one</label>
                    <input type="text" name="address" placeholder="where was the picture taken??"
                        class="form-control @error('address') is-invalid @enderror">
                           <br>
                    <select  name="address_id" class="form-control">
                        <?php echo $places_dropdown; ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-4 col-form-label">Upload Photo</label>
                    <div class="col-sm-6">
                        <input type="file" name="photo[]" class="form-control @error('photo') is-invalid @enderror" multiple/>
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="caption" class="col-sm-4 col-form-label">Caption</label>
                    <input type="text" name="caption" id="caption" placeholder="Add a brief caption..."
                        class="form-control @error('caption') is-invalid @enderror" >
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addpicture" class="btn btn-primary">Save changes</button>
              </div>
        </div>
      </div>
    </div>

    <!--================End Home Banner Area =================-->
    
     <!--================ Start Blog Area =================-->
        <section class="blog-area area-padding">
            <div class="container">
                <div class="area-heading">
                    <h3 class="line">View Gallery</h3>
                </div>
                @foreach($getAddress as $add)
                <div class="area-heading">
                    <a class="d-block" style="" href="single-blog.html">
                        <h4>{{$add->event->name}}--{{$add->name_place}}</h4>
                    </a>
                </div>
                <div class="row">                    
                    @foreach($add->galleries as $pics)
                    <div class="col-lg-4 col-md-4">
                        <div class="single-blog">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('images/gallery/'.$pics->photo) }}" alt="">
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <a data-toggle="modal" data-target="#editModal{{$add->id}}"class="btn btn-success btn-sm rounded-0"><i class="fa fa-edit"></i>Edit Info</a>
                                    <a href="#"><i class="ti-time"></i> </a>
                                </div>
                               
                                <p>{{$pics->caption}}</p>
                                <a href="{{url('/deletePic/'.$pics->id)}}"><i class="fa fa-trash"></i>Delete </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Modal -->
                <div class="modal fade" id="editModal{{$add->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form enctype="multipart/form-data" id="editForm" class="form-horizontal" method="post" action="/editForm">
                          @csrf
                          <div class="modal-body">
                            <div class="form-group">
                                <label for="event" class="col-sm-8 col-form-label">Edit Event/Select already created event</label>
                                <input type="text" name="name" id="name" placeholder="Write a new event name to replace the existing event name.."
                                    class="form-control" >
                                    <br>
                                <select  name="event_id" class="form-control">
                                    <?php echo $events_dropdown; ?>
                                </select>                      
                            </div>
                             <div class="form-group">
                                <label for="address" class="col-sm-8 col-form-label">EditPlace/select an existing one</label>
                                <input type="text" name="address" placeholder="Write a new place name to replace the existing place.."
                                    class="form-control ">
                                       <br>
                                <select  name="address_id" class="form-control">
                                    <?php echo $places_dropdown; ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-sm-4 col-form-label">Upload Photo</label>
                                <div class="col-sm-6">
                                    <input type="file" name="photo[]" class="form-control @error('photo') is-invalid @enderror" multiple/>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="caption" class="col-sm-4 col-form-label">Caption</label>
                                <input type="text" name="caption" id="caption" placeholder="Add a brief caption..."
                                    class="form-control @error('caption') is-invalid @enderror" >
                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                        </form>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="addpicture" class="btn btn-primary">Save changes</button>
                          </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        </section>
 
        <!--================ End Blog Area =================-->

@endsection