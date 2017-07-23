@extends('components.layout')

@section('title')
  Inversion Isles At Lagomar
@endsection

@section('content')
<section id="one-parallax" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container">
              <div class="post-wrapper-top-shadow">
                  <span class="s1"></span>
              </div>
              <div class="col-lg-12">
                  <h2>Isles At Lagomar</h2>
              </div>
          </div>
      </div>
  </section><!-- end post-wrapper-top -->

<section id="inmigracion" class="generalwrapper dm-shadow clearfix">
      <div class="container">
          <div class="row">
              <div id="content" class="col-lg-12 col-md-12 col-xs-12 clearfix">
                  <div class="property_wrapper   boxes clearfix">
                      <div class="row">
                          <!-- /.col-* -->
                            <div class="col-lg-12">
                                <div class="listing-detail-section" id="listing-detail-section-description">
                                  <h2 class="page-header">{!! trans('content.tituloIsles1') !!}</h2>
                                        <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">
                                            
                                            {!! trans('content.textoIsles1') !!}

                                        </p>
                                  
                              </div><!-- /.listing-detail-section -->
                          </div><!-- /.col-* -->
                      </div>
                  </div><!-- end property_wrapper -->
  
              </div><!-- end content -->

              <!-- end sidebar -->
          </div><!-- end row -->
      </div><!-- end container -->
  </section>
@endsection

