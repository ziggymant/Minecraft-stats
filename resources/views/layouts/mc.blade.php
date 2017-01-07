<!--

	This is a FREE template from GameTemplates.org!
	Removing this copyright or the ones at the bottom
	is AGAINST THE LAW!

	Visit Gametemplates.org for great templates!

-->
<!DOCTYPE html>
<html>
<head>
	<title>Minecraft servers</title>

	<link href="{{asset('css/libs.css')}}" rel="stylesheet">
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<link href="/css/styles.css" rel="stylesheet">

</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse " role="navigation">
			<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="{{url('/')}}">Home</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
									<li>
											<a href="#">About</a>
									</li>
									<li>
											<a href="#">Upload your server</a>
									</li>
									<li>
											<a href="{{url('top')}}">TOP #100 servers</a>
									</li>
								</ul>

								<ul class="nav navbar-nav navbar-right">


									@if (Auth::guest())
											<li><a href="{{ url('/login') }}">Login</a></li>
											<li><a href="{{ url('/register') }}">Register</a></li>
									@else
											<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
															{{ Auth::user()->name }} <span class="caret"></span>
													</a>

													<ul class="dropdown-menu" role="menu">
															<li>
																	<a href="{{ url('/logout') }}"
																			onclick="event.preventDefault();
																							 document.getElementById('logout-form').submit();">
																			Logout
																	</a>

																	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
																			{{ csrf_field() }}
																	</form>
															</li>
															@if (Auth::user()->isAdmin())
																<li>
																		<a href="{{url('/admin')}}">Admin page</a>
																</li>
															@endif
													</ul>
											</li>
									@endif
								</ul>

					</div>
					<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
	</nav>
<div class="container headLoc">
	<img src="{{url("img/spectrum.png")}}" alt="Replace with your logo!" height="150px" />
</div>
<div class="container">

	@yield('content')


</div> {{-- end main container --}}

	{{-- <div id="footer">
	    <div class="container">
	        <div class="row">
	              <div class="col-md-4">
	                <center>
	                  <img height="30" src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains">
	                  <br>
	                  <h4 class="footertext">Programmer</h4>
	                  <p class="footertext">You can thank all the crazy programming here to this guy.<br>
	                </center>
	              </div>
	              <div class="col-md-4">
	                <center>
	                  <img height="30" src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="...">
	                  <br>
	                  <h4 class="footertext">Artist</h4>
	                  <p class="footertext">All the images here are hand drawn by this man.<br>
	                </center>
	              </div>
	              <div class="col-md-4">
	                <center>
	                  <img height="30" src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="...">
	                  <br>
	                  <h4 class="footertext">Designer</h4>
	                  <p class="footertext">This pretty site and the copy it holds are all thanks to this guy.<br>
	                </center>
	              </div>
	            </div>
	            <div class="row">
	            <p><center><a href="#">Contact Stuff Here</a> <p class="footertext">Copyright 2014</p></center></p>
	        </div>
	    </div>
	</div>
--}}


<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"> Logo</div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
        <p><i class="fa fa-map-pin"></i> 210, Aggarwal Tower, Rohini sec 9, New Delhi -        110085, INDIA</p>
        <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 878 398</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@webenlance.com</p>

      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
          <li><a href="#"> Career</a></li>
          <li><a href="#"> Privacy Policy</a></li>
          <li><a href="#"> Terms & Conditions</a></li>
          <li><a href="#"> Client Gateway</a></li>
          <li><a href="#"> Ranking</a></li>
          <li><a href="#"> Case Studies</a></li>
          <li><a href="#"> Frequently Ask Questions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div id="rights" class="col-md-6 ">
      <p>© 2016 - All Rights with Webenlance</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">webenlance.com</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Faq's</a></li>
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Site Map</a></li>
      </ul>
    </div>
  </div>
</div>


</body>
<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')
</html>
<!--

	This is a FREE template from GameTemplates.org!
	Removing this copyright or the ones at the bottom
	is AGAINST THE LAW!

	Visit Gametemplates.org for great templates!

-->
