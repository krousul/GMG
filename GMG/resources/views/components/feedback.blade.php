	<div id="mrova-feedback" style="z-index: 100; display: block; height: 646px; right: 19px; top:846px;"> 
		<div id="mrova-contact-thankyou" style="display: none;">
			{!! trans('content.tituloFeedback1') !!} 
		</div>
		<div id="mrova-form">
			<form id="mrova-contactform" action="#" method="post">
				<ul >
					<li>
						<label for="mrova-name">{!! trans('content.campoFeedback1') !!}</label> <input type="text" name="mrova-name" class="required" id="mrova-name" value="">
					</li>
                                        <li>
						<label for="mrova-city">{!! trans('content.campoFeedback2') !!} </label> <input type="text" name="mrova-city" class="required" id="mrova-city" value="">
					</li>
                                        <li>
						<label for="mrova-phone">{!! trans('content.campoFeedback3') !!}  </label> <input type="text" name="mrova-phone" class="required" id="mrova-phone" value="">
					</li>
					<li>
						<label for="mrova-email">{!! trans('content.campoFeedback4') !!}</label> <input type="text" name="mrova-email" class="required" id="mrova-email" value="">
					</li>
					<li>
						<label for="mrova-message">{!! trans('content.campoFeedback5') !!}</label>
						<textarea class="required" id="mrova-message" name="mrova-message"  rows="5" cols="30"></textarea>
					</li>
				</ul>
				<input type="submit" value="{!! trans('content.buttonFeedback1') !!}" id="mrova-sendbutton" name="mrova-sendbutton">
			</form>
		</div>
            <div id="mrova-img-control"></div>
	</div>

	<!-- en el top tenia 646 -->