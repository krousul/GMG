@extends('components.layout')

@section('title')
  Servicios Inmobiliarios
@endsection

@section('content')
  <!-- 1 SLIDER style="height: 550px; overflow: hidden;"-->
  <section class="full-slider">
    <div class="mapandslider">
      <div id="property-slider" class="clearfix">
        <div class="flexslider">
          <ul class="slides">
         	  {!! trans('content.sliders') !!}
          </ul><!-- end slides -->
        </div><!-- end flexslider -->
      </div><!-- end property-slider -->
    </div>
  </section><!-- end  -->

  <!-- 2 NOSOTROS -->
  <section id="nosotros" class="generalwrapper clearfix">
      <div class="container"> <!--style="background: url(img/marcaAgua.png) no-repeat scroll 0 0; background-size:1200px 1000px"-->
          <div class="row">
              <div class="text-center clearfix">
                  <h3 class="big_title"> {!! trans('content.tituloNosotros1') !!}</h3>
              </div><!-- text-center -->
              <div class="col-md-8 col-md-offset-3">
                  <div class="col-md-8">
                    <p class="" style="text-align:justify; font-size: 16px !important; line-height: 1.6">

                        {!! trans('content.parrafoNosotros1') !!}

                    </p>   
                  </div>
                  <div class="col-md-3 col-md-offset-7" style="margin-top: -197px !important">
                        <img class="img-thumbnail img-responsive" src="img/logo-640.jpg" alt=""  style="border:none; max-height: 150px !important">
                  </div>
                  </div>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <div class="col-md-8 col-md-offset-2">
                  <p class="" style="text-align:justify; font-size: 16px !important; line-height: 1.6">
                  
                    {!! trans('content.parrafoNosotros2') !!}

                  </p>
              </div>
              <div class="text-center clearfix" style="margin-top: 678px; margin-left: -20px">
                  <h3 class="big_title"><p style="font-size: 16px !important"> {!! trans('content.tituloNosotros2') !!}  </p></h3>
              </div><!-- text-center -->
              <div class="col-md-8 col-md-offset-2">
              <p class="" style="text-align:justify; font-size: 16px !important; line-height: 1.6">
                  
                    {!! trans('content.parrafoNosotros3') !!}

              </p>
              </div>
          </div><!-- end row -->
      </div><!-- end container -->
  </section><!-- end parallax -->

  <section id="two-parallax" class="parallax" style="background-image: url('img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container padding-btm40">
              <div class="">
                  <div class="text-center clearfix">
                      <h3 class="big_title"> {!! trans('content.tituloNuestroServ1') !!} </h3>
                  </div>
              </div>
              <div class="row-feat">
                  {!! trans('content.servicios') !!}
              </div>
              </div>
          </div>
      </div>
  </section> <!-- end of way choosing us-->

  <section  id="team" class="generalwrapper clearfix">
      <div class="container">
                 {!! trans('content.equipo') !!} 
      </div><!-- end container -->
  </section><!-- end parallax -->

  <!-- 3 PROPIEDADES -->
  <section id="propi" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container container-pest">
                  <label for="tab" style="margin-top: 0px !important"><h2>{!! trans('content.tituloPropiedades1') !!} </h2></label>
                  <input id="tab-1" type="radio" name="tab-group" onclick="Tab1();" />
                  <label for="tab-1" style="margin-top: 0px !important"><h2>{!! trans('content.tituloPropiedades2') !!} </h2></label>
                  <input id="tab-2" type="radio" name="tab-group" onclick="Tab2();" />
                  <label for="tab-2" style="margin-top: 0px !important"><h2>{!! trans('content.tituloPropiedades3') !!} </h2></label>
                  <input id="tab-3" type="radio" name="tab-group" onclick="Tab3();" />
                  <label for="tab-3" style="margin-top: 0px !important"><h2>{!! trans('content.tituloPropiedades4') !!} </h2></label>
              </div>
          </div>
      </div>
  </section><!-- end post-wrapper-top -->

  <section id="propiedades" class="generalwrapper dm-shadow clearfix">
      <div class="container content-p">
          <div class="row">
              <!--Contenido de la Pestaña 1--> 
              <div id="content-1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="display:block;">
                  <div class="blog_container clearfix">

                      {!! trans('content.divProyecto') !!}
                                          

	                  <div class="pagination_wrapper clearfix">
	                      <!-- Pagination Normal -->
	                      <ul class="pagination">
	                          <li><a href="#">«</a></li>
	                          <li class="active"><a href="#">1</a></li>
	                          <!--<li><a href="#">2</a></li>
	                          <li><a href="#">3</a></li>
	                          <li><a href="#">4</a></li>
	                          <li><a href="#">5</a></li>-->
	                          <li class="disabled"><a href="#">»</a></li>
	                      </ul>
	                  </div>
	              <!--</div>end content -->
	
	              <!-- <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last clearfix">
	                  <div class="widget clearfix">
	                      <div class="preperty_search ">
	                          <div class="title">
	                              <h3>Busqueda Avanzada</h3>
	                          </div>
	
	                          <div class="search-section serach-widget clearfix boxes">
	                              <form id="advanced_search" action="#" class="clearfix row" name="advanced_search" method="post">
	                                  <div class="col-xs-12">
	                                     <label for="location">Zona</label>
	                                      <select id="location" class="show-menu-arrow selectpicker">
	                                          <option value="Tokyo">Tokyo</option>
	                                          <option value="paris">paris</option>
	                                          <option value="bodrum">Bodrum</option>
	                                          <option value="Tokyo City">Tokyo City</option>
	                                          <option value="Nagatu">Nagatu</option>
	                                          <option value="ngasaki">ngasaki</option>
	                                      </select>
	                                  </div>
	                                  <div class="col-xs-12">
	                                       <label for="sub-ocation">Tipo de Propiedad</label>
	                                      <select id="sub-ocation" class="show-menu-arrow selectpicker">
	                                          <option value="Tokyo">Tokyo</option>
	                                          <option value="paris">paris</option>
	                                          <option value="bodrum">Bodrum</option>
	                                          <option value="Tokyo City">Tokyo City</option>
	                                          <option value="Nagatu">Nagatu</option>
	                                          <option value="ngasaki">ngasaki</option>
	                                      </select>
	
	
	                                  </div>
	                                  <div class="col-xs-12">
	                                      <label for="status">Status</label>
	                                      <select id="status" class="show-menu-arrow selectpicker">
	                                          <option value="rent">On Rent</option>
	                                          <option value="sale">On Sale</option>
	                                      </select>
	                                  </div>
	                                  <div class="col-xs-12">
	                                      <label for="min_price">Min Price</label>
	                                      <select id="min_price" class="show-menu-arrow selectpicker">
	                                          <option value="0">$0</option>
	                                          <option value="1000">$1000</option>
	                                          <option value="5000">$5000</option>
	                                          <option value="10000">$10000</option>
	                                          <option value="25000">$25000</option>
	                                          <option value="50000+">$50000+</option>
	                                      </select>
	                                  </div>
	                                  <div class="col-xs-12">
	                                      <label for="max_price">Max Price</label>
	                                      <select id="max_price" class="show-menu-arrow selectpicker">
	                                          <option value="1000">$1000</option>
	                                          <option value="5000">$5000</option>
	                                          <option value="15000">$15000</option>
	                                          <option value="25000">$25000</option>
	                                          <option value="50000">$50000</option>
	                                          <option value="100000+">$100000+</option>
	                                      </select>
	                                  </div>
	                                  <div class="clearfix"></div>
	                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                                      <a href="#" class="btn btn-inverse btn-block"><i class="icofont icofont-home-search"></i> Buscar</a>
	                                  </div>
	                              </form>
	                          </div><!-- end search module -->
                      </div>
                  </div>
              <!-- </div><!-- end sidebar --> 
                  
                  <!--Contenido de la Pestaña 2-->
                  <div id="content-2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="display:none;">
                    <div class="blog_container clearfix">
                      <p class="column-left">
                          panama
                      </p>
                    </div>  
                  </div>
                  <!--Contenido de la Pestaña 3-->
                  <div id="content-3" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="display:none;">
                    <div class="blog_container clearfix">
                      <p>
                        venezuela
                      </p>
                    </div>  
                  </div>  
        </div><!-- end row -->
      </div><!-- end container -->              
  </section><!-- end generalwrapper -->


  <section id="one-parallax financiamiento" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container">
              <div class="post-wrapper-top-shadow">
                  <span class="s1"></span>
              </div>
              <div class="col-lg-12">
                  <h2> {!! trans('content.tituloFinanciamiento1') !!} </h2>
              </div>
          </div>
      </div>
  </section><!-- end post-wrapper-top -->

<section id="financiamiento" class="generalwrapper dm-shadow clearfix">
      <div class="container">
          <div class="row">
              <div id="content" class="col-lg-12 col-md-12 col-xs-12 clearfix">
                  <div class="property_wrapper   boxes clearfix">
                      <div class="row">
                          <!-- /.col-* -->
                          <div class="col-lg-12">
                          <div class="col-lg-9">
                              <div class="listing-detail-section" id="listing-detail-section-description">
                                  <h2 class="page-header">{!! trans('content.tituloFinanciamiento2') !!} </h2>
                                    <p style="text-align:justify; font-size: 14px !important; line-height: 1.6">
                                                        
                                        {!! trans('content.textoFinanciamiento1') !!}

                                    </p>
                                    <div class="col-lg-5 clearfix">
                                        <img class="img-thumbnail img-responsive" src="img/financiamiento1.jpg" alt="">
                                    </div>
                                    <div class="col-lg-7 clearfix">
                                        <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">

                                          {!! trans('content.textoFinanciamiento2') !!}
    
                                        </p>
                                    </div>
                                    <div class="col-lg-12 clearfix">
                                      <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">

                                          {!! trans('content.textoFinanciamiento3') !!}

                                      </p>
                                    </div>   
                                    <div class="col-lg-6 clearfix" style="margin-top: -29px">
                                        <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">
                                            <br/>

                                            {!! trans('content.textoFinanciamiento4') !!}
   
                                        </p>
                                    </div>
                                    <div class="col-lg-6 clearfix">
                                        <img class="img-thumbnail img-responsive" src="img/financiamiento2.jpg" alt="">
                                    </div>      
                                    <div class="col-lg-12 clearfix">
                                      <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">

                                          {!! trans('content.textoFinanciamiento5') !!}

                                      </p>
                                    </div>
                                    <br/>
                                    <br/>
                                    <br/>
                                     <div class="col-lg-12 clearfix">
                                    <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">

                                        {!! trans('content.textoFinanciamiento6') !!}

                                    </p>
                                     </div>
                                    
                                    
                              </div><!-- /.listing-detail-section -->
                              </div>
                              <div class="col-lg-3" style="margin-top: 188px">
                              <div class="widget clearfix" id="loan_calculator">
                            <div class="preperty_search ">
                                <div class="title">
                                    <h3>{!! trans('content.calculadora1') !!} </h3>
                                </div>

                                <form action="#" class="boxes " style="padding: 20px 10px;">
                                    <div class="form-group">
                                        <label for="loan">{!! trans('content.calculadora2') !!} </label>
                                        <input class="form-control" id="loan" placeholder="15,00,000" type="text">
                                    </div> 
                                    <!-- End .single_form --> 
                                    <div class="form-group"> 
                                        <label for="income"> {!! trans('content.calculadora3') !!} </label>
                                        <input class="form-control" id="income" placeholder="50,000" type="text">
                                    </div> 
                                    <!-- End .single_form -->
                                    <div class="form-group">
                                        <label>{!! trans('content.calculadora4') !!}</label>

                                        <select class="form-control" id="ui-id-12">
                                            <option selected="selected">{!! trans('content.calculadora5') !!} </option>
                                            <option>{!! trans('content.calculadora6') !!} </option>
                                            <option>{!! trans('content.calculadora7') !!} </option>
                                        </select>

                                        <!-- End .single_form -->
                                    </div>
                                    <div class="form-group">
                                        <label for="interest">{!! trans('content.calculadora8') !!} </label>
                                        <input class="form-control" id="interest" placeholder="10%" type="text">
                                    </div> 
                                    <!-- End .single_form -->
                                    <button class="btn btn-primary search width-100-100">{!! trans('content.calculadora9') !!} </button>
                                </form>
                            </div>
                        </div>
                              </div>
                          </div><!-- /.col-* -->
                      </div>
                  </div><!-- end property_wrapper -->
              </div><!-- end content -->

              <!-- end sidebar -->
          </div><!-- end row -->
      </div><!-- end container -->
  </section>
  
  <section id="one-parallax inversiones" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container">
              <div class="post-wrapper-top-shadow">
                  <span class="s1"></span>
              </div>
              <div class="col-lg-12">
                  <h2>{!! trans('content.inversiones1') !!} </h2>
              </div>
          </div>
      </div>
  </section><!-- end post-wrapper-top -->

<section id="inversiones" class="generalwrapper dm-shadow clearfix">
      <div class="container">
          <div class="row">
              <div id="content" class="col-lg-12 col-md-12 col-xs-12 clearfix">
                  <div class="blog_container clearfix">
						{!! trans('content.inversiones') !!}
                  </div><!-- end row -->      
              </div><!-- end content -->
              <!-- end sidebar -->
          </div><!-- end row -->
      </div><!-- end container -->
  </section>
  
  <section id="one-parallax inmigracion" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container">
              <div class="post-wrapper-top-shadow">
                  <span class="s1"></span>
              </div>
              <div class="col-lg-12">
                  <h2> {!! trans('content.tituloInmigracion1') !!} </h2>
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
                                  <h2 class="page-header"> {!! trans('content.tituloInmigracion2') !!} </h2>
                                  <div class="col-lg-5 clearfix">
                                        <img class="img-thumbnail img-responsive" src="img/inmigracion1.jpg" alt="">
                                    </div>
                                    <div class="col-lg-7 clearfix">
                                        <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">

                                            {!! trans('content.textoInmigracion1') !!}
 
                                        </p>
                                    </div>
                                    <p style="text-align:justify; font-size: 14px !important; line-height: 1.8">

                                            {!! trans('content.textoInmigracion2') !!}

                                      </p>
                                      <br/>
                                      <br/>
                                      <div class="col-md-2 col-md-offset-6">
                                      <a href="{{ route('inmigra') }}" ><input type="submit" name="button" value="{!! trans('content.verMas') !!}" class="btn btn-primary"/><a/>
                                      </div>
                                  
                                    
                                  
                              </div><!-- /.listing-detail-section -->
                          </div><!-- /.col-* -->
                      </div>
                  </div><!-- end property_wrapper -->
  
              </div><!-- end content -->

              <!-- end sidebar -->
          </div><!-- end row -->
      </div><!-- end container -->
  </section>

  <section id="one-parallax noticias" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
      <div class="overlay1 dm-shadow">
          <div class="container">
              <div class="post-wrapper-top-shadow">
                  <span class="s1"></span>
              </div>
              <div class="col-lg-12">
                  <h2>{!! trans('content.tituloNoticias1') !!} </h2>
              </div>
          </div>
      </div>
  </section><!-- end post-wrapper-top -->


  <section id="noticias" class="generalwrapper dm-shadow clearfix">
      <div class="container">
          <div class="row">
              <div id="content" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 clearfix">
                  <div class="blog_container clearfix">
                      <h2 class="page-header">Instagram Global Money Group</h2>

<!--                           @if(!empty($items)) -->

<!--                            @foreach($items as $key => $item) -->

<!--                              <div class="col-md-4"> -->
   
                                    <a href="{{ $item['link'] }}" target="_blank"><img src="{{ $item['images']['standard_resolution']['url'] }}" style="width:215px;"></a>

<!--                                     </br> -->

<!--                                     {{ isset($item['location']['name']) ? $item['location']['name'] : '' }} -->

<!--                                     </br> -->

<!--                               </div>       -->

<!--                             @endforeach -->

                           

<!--                             @else -->

<!--                               <div id="content" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 clearfix"> -->
              
<!--                                 <p>There are no data.</p> -->

<!--                               </div>   -->

<!--                            @endif -->
          
                            
                    <div class="pagination_wrapper clearfix">
                      <!-- Pagination Normal -->
                      <ul class="pagination">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="disabled"><a href="#">»</a></li>
                      </ul>
                  </div >

                  </div> <!--end blog container-->  
              </div> <!--end content -->

              <div id="right_sidebar" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 last clearfix">
                  <!--FEATURED PROPERTIES -->
                  <div class="widget sidebar_agent clearfix">
                      <div class="title">
                          <h3>{!! trans('content.tituloNoticias2') !!}</h3>
                      </div>
                      <div class="property_slider_box">
                          <div id="myCarousel16" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner" role="listbox">
                                  <div class="item active">
                                      <div class="propety_slide_f boxes">
                                          <div class="ImageWrapper big-ImageWrapper  boxes_img">
                                              <img class="img-responsive" src="img/rotativo/gm1.png" alt="">
                                          </div>
                                          <h2 class="title"><a href="https://www.instagram.com/p/zKz_GEAY6s/" target="_blank">Miami World Resort</a>
                                              <a class="box-agent-icon" href="{{route('contact')}}"><img src="img/team/gracinda-gouveia.JPG" alt="Gracinda Gouveia"></a>
                                          </h2>
                                      </div>
                                      <div class="propety_slide_f boxes">
                                          <div class="ImageWrapper big-ImageWrapper  boxes_img">
                                              <img class="img-responsive" src="img/rotativo/gm2.png" alt="">
                                          </div>
                                          <h2 class="title"><a href="https://www.instagram.com/p/zh4JbFgYzC/" target="_blank">Propiedades en la playa</a> 
                                              <a class="box-agent-icon" href="{{route('contact')}}"><img src="img/team/rodolfo-valdivieso.JPG" alt="Rodolfo Valdivieso"></a>
                                          </h2>
                                      </div>
                                      <div class="propety_slide_f boxes">
                                          <div class="ImageWrapper big-ImageWrapper  boxes_img">
                                              <img class="img-responsive" src="img/rotativo/gm3.png" alt="">
                                          </div>
                                          <h2 class="title"><a href="https://www.instagram.com/p/zlaC6QAY12/" target="_blank">The Marquesa</a>
                                              <a class="box-agent-icon" href="{{route('contact')}}"><img src="img/team/fatima-gouveia.JPG" alt="Fatima Gouveia"></a>
                                          </h2>
                                      </div>
                                      
                                  </div>
                                  <div class="item">
                                      <div class="propety_slide_f boxes">
                                          <div class="ImageWrapper big-ImageWrapper  boxes_img">
                                              <img class="img-responsive" src="img/rotativo/gm4.png" alt="">
                                          </div>
                                          <h2 class="title"><a href="https://www.instagram.com/p/4-NtvqgYx7/" target="_blank">Negocios en Miami</a>
                                              <a class="box-agent-icon" href="{{route('contact')}}"><img src="img/team/gracinda-gouveia.JPG" alt="Gracinda Gouveia"></a>
                                          </h2>
                                      </div>
                                      <div class="propety_slide_f boxes">
                                          <div class="ImageWrapper big-ImageWrapper  boxes_img">
                                              <img class="img-responsive" src="img/rotativo/gm5.png" alt="">
                                          </div>
                                          <h2 class="title"><a href="https://www.instagram.com/p/4-PtoWAY2l/" target="_blank">Miami - capital de Latinoamerica</a>
                                              <a class="box-agent-icon" href="{{route('contact')}}"><img src="img/team/rodolfo-valdivieso.JPG" alt="Rodolfo Valdivieso"></a>
                                          </h2>
                                      </div>
                                      <div class="propety_slide_f boxes">
                                          <div class="ImageWrapper big-ImageWrapper  boxes_img">
                                              <img class="img-responsive" src="img/rotativo/gm6.png" alt="">
                                          </div>
                                          <h2 class="title"><a href="https://www.instagram.com/p/BPK2Ae_FaRM/" target="_blank">YES of course!</a>
                                              <a class="box-agent-icon" href="{{route('contact')}}"><img src="img/team/fatima-gouveia.JPG" alt="Fatima Gouveia"></a>
                                          </h2>
                                      </div> 
                                  </div>
                              </div> <!-- End .carousel-inner -->
                          </div>
                          <!-- Left and right controls -->
                          <a class="carousel_control left" href="#myCarousel16" role="button" data-slide="prev">
                              <i class="fa fa-angle-left"></i>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel_control right" href="#myCarousel16" role="button" data-slide="next">
                              <i class="fa fa-angle-right"></i>
                              <span class="sr-only">Next</span>
                          </a>
                      </div> <!-- End .slider_box -->
                  </div>

              </div><!-- end sidebar -->

          </div> <!--end row -->
      </div> <!--end container -->
  </section><!-- end generalwrapper -->

  <section class="generalwrapper dm-shadow clearfix">
      <div class="container">
          <div class="row">

              <div id="content" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-9 col-md-9 col-sm-10 col-xs-12 clearfix">
                  <div class="modal-body clearfix">
                      <h3 class="big_title">{!! trans('content.textoContactanos1') !!}</h3>
                      <hr>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div style="max-height: 93px !important">
                              <img src="img/logo-tr.png" class="img-responsive contact_about_img" alt="Real estate template">
                          </div>
                          <div class="servicetitle"><h3>{!! trans('content.tituloContact1') !!}</h3></div>
                          <ul>
                              <li><i class="fa fa-external-link"></i> www.globalmoneygroup.com</li>
                              <li><i class="fa fa-envelope"></i> info@globalmoneygroup.com</li>
                              <li><i class="fa fa-phone-square"></i>+58 414-1816000</li>
                          </ul>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <form id="contact" class="row" action="contact.php" name="contactform" method="post">
                              <input type="text" name="name" id="name" class="form-control" placeholder="{!! trans('content.campoContact1') !!}">
                              <input type="text" name="email" id="email" class="form-control" placeholder="{!! trans('content.campoContact2') !!}">
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="{!! trans('content.campoContact3') !!}">
                              <input type="text" name="subject" id="subject" class="form-control" placeholder="{!! trans('content.campoContact4') !!}">
                              <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="{!! trans('content.campoContact5') !!}"></textarea>
                              <button type="button" class="btn btn-primary">{!! trans('content.buttonContact1') !!}</button>
                          </form>
                      </div>
                  </div>
              </div><!-- end content -->

          </div><!-- end row -->
      </div><!-- end container -->
  </section><!-- end generalwrapper -->


@endsection


@section('scripts')
  <!-- FlexSlider JavaScript
  ================================================== -->
  <script src="js/jquery.flexslider.js"></script>

  <script>
  $(window).load(function () {
    $('#property-slider .flexslider').flexslider({
      animation: "fade",
      slideshowSpeed: 4550,
      animationSpeed: 1300,
      directionNav: true,
      controlNav: true,
      keyboardNav: true
    });
  });
  </script>
  <script>
    
    function Tab1(){
        var cont1 = document.getElementById("content-1");
        cont1.style.display = "block";

        var cont2 = document.getElementById("content-2");
        cont2.style.display = "none";

        var cont3 = document.getElementById("content-3");
        cont3.style.display = "none";
 
        return true;
    }

    function Tab2(){
        var cont1 = document.getElementById("content-1");
        cont1.style.display = "none";

        var cont2 = document.getElementById("content-2");
        cont2.style.display = "block";

        var cont3 = document.getElementById("content-3");
        cont3.style.display = "none";

        return true;
    }

    function Tab3(){
        var cont1 = document.getElementById("content-1");
        cont1.style.display = "none";

        var cont2 = document.getElementById("content-2");
        cont2.style.display = "none";

        var cont3 = document.getElementById("content-3");
        cont3.style.display = "block";

        return true;
    }
    
  </script>
@endsection
