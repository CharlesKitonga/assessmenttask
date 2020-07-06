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
                    <label for="event" class="col-sm-4 col-form-label">Event</label>
                    <input type="text" name="event" id="event" placeholder="What is the the event??"
                        class="form-control @error('event') is-invalid @enderror" >
                    @error('event')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                        
                </div>
                 <div class="form-group">
                    <label for="place" class="col-sm-4 col-form-label">Place</label>
                    <input type="text" name="place" placeholder="whre are you taking the picture from??"
                        class="form-control @error('place') is-invalid @enderror">
                    @error('place')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-4 col-form-label">Upload Photo</label>
                    <div class="col-sm-6">
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"/>
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

    <!--================ Start Portfolio Area =================-->
    <section class="portfolio_area area-padding" id="portfolio">
        <div class="container">
            <div class="area-heading">
                <h3>Check <span>Recent</span> Work</h3>
                <p>She'd earth that midst void creeping him above seas.</p>
            </div>

            <div class="filters portfolio-filter">
                <ul>
                    <li class="active" data-filter="*">all</li>
                    <li data-filter=".weeding">weeding </li>
                    <li data-filter=".motion"> motion</li>
                    <li data-filter=".portrait">portrait</li>
                    <li data-filter=".fashion">fashion</li>
                </ul>
            </div>

            <div class="filters-content">
                <div class="row portfolio-grid">
                    <div class="grid-sizer col-md-3 col-lg-4"></div>
                    <div class="col-lg-4 col-md-6 all fashion motion">
                        <div class="single_portfolio">
                            <img class="img-fluid w-100" src="img/project/1.jpg" alt="">
                            <div class="short_info">
                                <p>Fashion</p>
                                <h4><a href="portfolio-details.html">Fahion photography</a></h4>                            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 all weeding motion portrait">
                        <div class="single_portfolio">
                            <img class="img-fluid w-100" src="img/project/2.jpg" alt="">
                            <div class="short_info">
                                <p>construction</p>
                                <h4><a href="portfolio-details.html">Desert Work, Dubai</a></h4>                            
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 all weeding motion fashion">
                        <div class="single_portfolio">
                            <img class="img-fluid w-100" src="img/project/4.jpg" alt="">
                            <div class="short_info">
                                <p>construction</p>
                                <h4><a href="portfolio-details.html">Desert Work, Dubai</a></h4>                            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 all motion portrait fashion">
                        <div class="single_portfolio">
                            <img class="img-fluid w-100" src="img/project/5.jpg" alt="">
                            <div class="short_info">
                                <p>construction</p>
                                <h4><a href="portfolio-details.html">Desert Work, Dubai</a></h4>                            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 all weeding  fashion">
                        <div class="single_portfolio">
                            <img class="img-fluid w-100" src="img/project/6.jpg" alt="">
                            <div class="short_info">
                                <p>construction</p>
                                <h4><a href="portfolio-details.html">Desert Work, Dubai</a></h4>                            
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================ End Portfolio Area =================-->

@endsection