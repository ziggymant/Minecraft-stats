<!--

	This is a FREE template from GameTemplates.org!
	Removing this copyright or the ones at the bottom
	is AGAINST THE LAW!

	Visit Gametemplates.org for great templates!

-->
<!DOCTYPE html>
<html>
<head>
	<title>MineSquare - Welcome to our site</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
											<a href="#">Services</a>
									</li>
									<li>
											<a href="#">Contact</a>
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
	<img src="img/spectrum.png" alt="Replace with your logo!" height="150px" />
</div>
<div class="container">

	<div class="row">

	@yield('content')

	</div>
	<br />
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="pull-right small"><a href="https://gametemplates.org/">A free template by Gametemplates.org</a></p><!--Removing the gametemplates copyright is against the law! -->
			<p class="small">&copy; MineSquare 2015</p>
		</div>
	</div>
</div>
</body>
</html>
<!--

	This is a FREE template from GameTemplates.org!
	Removing this copyright or the ones at the bottom
	is AGAINST THE LAW!

	Visit Gametemplates.org for great templates!

-->
