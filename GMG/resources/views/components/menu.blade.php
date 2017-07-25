<div class="main_menu fixed_menu" id="menu">
    <div class="container">
        <div class="wrapper">
            <div class="header-logo hidden-sm hidden-xs">
                <a href="{{route('home')}}"><img src="img/logo-hz.jpg" alt="logo" class="img-responsive" style="max-width:260px; margin-top: -16px"></a>
            </div> <!-- End .header-logo -->
            <!-- Menu ______________ -->
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a href="{{route('home')}}" style="margin:1em; display:inline-block" class="hidden-lg hidden-md"><img src="img/logo-hz.jpg" alt="logo" class="img-responsive" style="max-width:200px; margin-top: -16px"></a>
                </div> <!-- End .navbar-header -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="">
                          <a href="{{route('home')}}#nosotros">{!! trans('content.menu1') !!}</a>
                        </li>
                        <li class="sub-menu-holder dropdown">
                          <a href="{{route('home')}}#propi">{!! trans('content.menu2') !!}</a>
                           <ul class="sub-menu">
                                <li><a data-description="usa" href="{{route('home')}}#propi" onclick="Tab1();" >USA</a></li>
                                <li><a data-description="panama" href="{{route('home')}}#propi" onclick="Tab2();">Panama</a></li> 
                                <li><a data-description="venezuela" href="{{route('home')}}#propi" onclick="Tab3();">Venezuela</a></li>
                            </ul>
                        </li>
                        <li class="">
                          <a href="{{route('home')}}#one-parallax financiamiento">{!! trans('content.menu3') !!}</a>
                        </li>
                          <li class="">
                          <a href="{{route('home')}}#one-parallax inversiones"> {!! trans('content.menu4') !!}</a>
                        </li>
                        <li class="">
                          <a href="{{route('home')}}#one-parallax inmigracion">{!! trans('content.menu5') !!}</a>
                        </li>
                        <li class="">
                          <a href="{{route('home')}}#one-parallax noticias"> {!! trans('content.menu6') !!}</a>
                        </li>
                        <li>
                          <a href="{{ route('contact') }}">{!! trans('content.menu7') !!}</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav> <!-- End .navbar -->
            <!-- End Menu __________ -->
        </div>  <!-- End .wrapper -->
    </div> <!-- End .container -->
</div>
