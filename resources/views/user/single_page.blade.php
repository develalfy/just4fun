@extends('layouts.user')
@section('content')
	<div class="col-sm-9 col-sm-9 placeholder">
		<div class="top-ads">
			<img src="{{ url('frontend/images/ads1.jpg') }}" alt="">
		</div>
	</div>
	<div id="container">
		<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">

			<div class="row placeholders">
				<h3>اكتر الفيديوهات المضحكه</h3>

				<div id="container" class="clearfix">
					<div id="content" class="defaults">

						<!-- item container -->
						<ul id="itemContainer">
							<div class="col-xs-9 col-sm-offset-0 col-sm-4 col-sm-offset-3 col-md-4  placeholder">
								<li><a href="inner.html"><img src="{{ url('frontend/images/videos/1.jpg') }}"
								                              class="img-responsive" alt="Populer videos"><h4>فيديو</h4>
									</a></li>
							</div>
							<div class="col-xs-9 col-sm-offset-0 col-sm-4 col-sm-offset-3 col-md-4  placeholder">
								<li><a href=""><img src="{{ url('frontend/images/videos/1.jpg') }}"
								                    class="img-responsive" alt="Populer videos"><h4>فيديو</h4></a></li>
							</div>
							<div class="col-xs-9 col-sm-offset-0 col-sm-4 col-sm-offset-3 col-md-4  placeholder">
								<li><a href=""> <img src="{{ url('frontend/images/videos/1.jpg') }}"
								                     class="img-responsive" alt=""><h4>فيديو</h4></a></li>
							</div>
							<div class="col-xs-9 col-sm-offset-0 col-sm-4 col-sm-offset-3 col-md-4  placeholder">
								<li><a href=""> <img src="{{ url('frontend/images/videos/1.jpg') }}"
								                     class="img-responsive" alt=""><h4>فيديو</h4></a></li>
							</div>
							<div class="col-xs-9 col-sm-offset-0 col-sm-4 col-sm-offset-3 col-md-4  placeholder">
								<li><a href=""><img src="{{ url('frontend/images/videos/1.jpg') }}"
								                    class="img-responsive" alt=""><h4>فيديو</h4></a></li>
							</div>
						</ul>
					</div>
				</div>
				<div class="holder"></div>
				<!-- navigation holder -->

			</div>
		</div>
		<div class="col-sm-3 col-sm-3 placeholder right-ads">
			<div id="right-ads">
				<img src="images/ads2.jpg" alt="">
			</div>
		</div>
	</div>
@endsection