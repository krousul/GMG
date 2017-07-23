@extends('components.layout')

@section('title')
  Inversión The Marquesa
@endsection

@section('content')
 <section id="one-parallax" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container">
              <div class="post-wrapper-top-shadow">
                  <span class="s1"></span>
              </div>
              <div class="col-lg-12">
                  <h2>The Marquesa</h2>
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
                                            
                                            {!! trans('content.textoMarquesa1') !!}  

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

@section('scripts')
 <!-- <script type="text/javascript" src="js/gmaps.js"></script>

      <script type="text/javascript">
          $(function () {
              map();
          }); /* map */

          function map() {
              var styles = [{"featureType": "landscape", "stylers": [{"saturation": -100}, {"lightness": 65}, {"visibility": "on"}]}, {"featureType": "poi", "stylers": [{"saturation": -100}, {"lightness": 51}, {"visibility": "simplified"}]}, {"featureType": "road.highway", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "road.arterial", "stylers": [{"saturation": -100}, {"lightness": 30}, {"visibility": "on"}]}, {"featureType": "road.local", "stylers": [{"saturation": -100}, {"lightness": 40}, {"visibility": "on"}]}, {"featureType": "transit", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "administrative.province", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "on"}, {"lightness": -25}, {"saturation": -100}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"hue": "#ffff00"}, {"lightness": -25}, {"saturation": -97}]}];
              map = new GMaps({
                  el: '#map',
                  lat: -12.043333,
                  lng: -77.028333,
                  zoomControl: true,
                  zoomControlOpt: {
                      style: 'SMALL',
                      position: 'TOP_LEFT'
                  },
                  panControl: false,
                  streetViewControl: false,
                  mapTypeControl: false,
                  overviewMapControl: false,
                  scrollwheel: false,
                  draggable: false,
                  styles: styles
              });
              var image = 'img/map-marker-blue.png';
              map.addMarker({
                  lat: -12.043333,
                  lng: -77.028333,
                  icon: image ,
                   title: '',
                   infoWindow: {
                   content: '<p>Global Money Group</p>'
                   }
              });
          }

      </script>-->

@endsection
