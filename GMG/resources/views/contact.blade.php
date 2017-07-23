@extends('components.layout')

@section('title')
  Servicios Contacto
@endsection

@section('content')
  <!--<section class="clearfix dm-shadow">
      <div class="map">
          <div id="map"></div>
      </div><!-- end map -->
  <!--</section><!-- clearfix -->

  <section class="generalwrapper dm-shadow clearfix">
      <div class="container">
          <div class="row">

              <div id="content" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-9 col-md-9 col-sm-10 col-xs-12 clearfix">
                  <div class="modal-body clearfix">
                      <!--<h3 class="big_title">AQUI ESTA  Nahuel, Do you have questions? <small>Dont worry! We're here to help you</small></h3>-->
                      <p>{!! trans('content.textContact1') !!}</p>
                      <hr>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="ImageWrapper boxes_img">
                              <img src="img/logo-tr.png" class="img-responsive contact_about_img" alt="Real estate template">
                              <div class="ImageOverlayH"></div>
                              <div class="Buttons StyleSc">
                                  <span class="WhiteSquare"><a href="#"><i class="fa fa-facebook"></i></a></span>
                                  <span class="WhiteSquare"><a href="#"><i class="fa fa-twitter"></i></a></span>
                                  <span class="WhiteSquare"><a href="#"><i class="fa fa-google-plus"></i></a></span>
                              </div>
                          </div>
                          <div class="servicetitle"><h3>{!! trans('content.tituloContact1') !!}</h3></div>
                          <ul>
                              <li><i class="fa fa-external-link"></i> www.globalmoneygroup.com</li>
                              <li><i class="fa fa-envelope"></i> info@globalmoneygroup.com</li>
                              <li><i class="fa fa-phone-square"></i> +58 414-1816000</li>
                          </ul>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <form id="contact" class="row" action="contact.php" name="contactform" method="post">
                              <input type="text" name="name" id="name" class="form-control" placeholder="{!! trans('content.campoContact1') !!}">
                              <input type="text" name="email" id="email" class="form-control" placeholder="{!! trans('content.campoContact2') !!}">
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="{!! trans('content.campoContact3') !!}">
                              <input type="text" name="subject" id="subject" class="form-control" placeholder="{!! trans('content.campoContact4') !!}">
                              <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="{!! trans('content.campoContact5') !!}"></textarea>
                              <button type="button" class="btn btn-primary">{!! trans('content.buttonContact1') !!} </button>
                          </form>
                      </div>
                  </div>
              </div><!-- end content -->

          </div><!-- end row -->
      </div><!-- end container -->
  </section><!-- end generalwrapper -->

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
