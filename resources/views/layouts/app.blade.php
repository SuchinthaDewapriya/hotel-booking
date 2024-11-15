@include('includes.header')

<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
				<div id="gtco-logo"><a href="{{ url('/')}}"><img src="{{ asset('public/images/logo.jpeg')}}" width="20%"></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="menu.html">Menu</a></li>
						<li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="#">Food Catering</a></li>
								<li><a href="#">Wedding Celebration</a></li>
								<li><a href="#">Birthday's Celebration</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					<li class="btn-cta"><a href="{{ url('reservation') }}"><span>Reservation</span></a></li>
					</ul>	
				</div>
			</div>
			
		</div>
    </nav>
    
    

    @yield('content') 

	</div>
@include('includes.footer')