<footer id="footer">
    <div class="container">
        <div class="row">
            <!-- col #1 -->
            <div class="logo_footer dark col-md-3">
                <img  src="img/logo-tr.png" alt="" class="footer-logo">
                <p class="block" style="color: #fff">
                    <small> 
                    {!! trans('content.footer1') !!} info@globalmoneygroup.com<br>
                    {!! trans('content.footer2') !!} +58 414-1816000<br>
                    </small>
                </p>
                <p class="block"><!-- social -->
                   <div class="top_bar_social col-md-8 col-md-offset-1">
                    <!-- <a class="fac" href="#"><i class="fa fa-facebook"></i></a> -->
                    <a class="twi" href="https://twitter.com/globalmoneyg" target="_BLANK"><i class="fa fa-twitter"></i></a>
                    <a class="goo" href="https://plus.google.com/111938267011435361634" target="_BLANK"><i class="fa fa-google-plus"></i></a>
                    <!-- <a class="lin" href="#"><i class="fa fa-linkedin"></i></a>-->
                    <a class="you" href="https://www.youtube.com/channel/UCMByddlLK-xTe-F9SG4-Zlw" target="_BLANK"><i class="fa fa-youtube"></i></a>
                    <a class="ins" href="https://www.instagram.com/globalmoneygroup/" target="_BLANK"><i class="fa fa-instagram"></i></a>
                    <!-- <a class="sky" href="#"><i class="fa fa-skype"></i></a>-->
                </div>
                </p><!-- /social -->
            </div>
            <!-- col #2 -->
            <div class="col-md-5" Style="overflow-y:scroll; height:280px">

                <h4>{!! trans('content.footer3') !!}</h4>    
                 <table class="table">
                        <tbody>
                            @if(!empty($data))
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td style="text-align: center; border-top: 0px !important;">
                                            @if(!empty($value['extended_entities']['media']))
                                                @foreach($value['extended_entities']['media'] as $v)
                                                    <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                                                    <a href="{{ $v['url'] }}" target="_BLANK" style="color:white !important">
                                                        <p>
                                                            {{ $value['text'] }}
                                                        </p>
                                                    </a>
                                                    <small class="ago">
                                                        {{ $value['created_at'] }}
                                                    </small>

                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">There are no data.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

            </div>
            <!-- /col #3 -->
            <div class="col-md-4 col-sm-4 hidden-xs">
                <iframe name="webs" src="https://www.youtube.com/channel/UCMByddlLK-xTe-F9SG4-Zlw" marginwidth="1" marginheight="0" width="500" height="500" border="0" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <hr>
    <div class="copyright">
        <div class="container fsize12" style="margin-left: 265px !important;">
           © Global Money Group 2016 - All Right Reserved 
        </div>
    </div>
</footer>

<a class="showit scrollToTop" href="#" id="backToTop"><i class="fa fa-angle-up"></i></a>