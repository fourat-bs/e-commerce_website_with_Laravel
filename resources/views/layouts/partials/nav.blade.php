<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/e06bff82bf.js" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index.html"><span class="flaticon-meal-1 mr-1"></span>LYOOM<br><small>CANTINE</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/resto/public/home" class="nav-link">Acceuil</a></li>
	          <li class="nav-item"><a href="/resto/public/menu" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="/resto/public/about" class="nav-link">A Propos</a></li>
	          <li class="nav-item"><a href="/resto/public/contact" class="nav-link">Contact</a></li>
	          @if( auth()->check() )
	           <li class="nav-item">
	           	<a class="nav-link" href={{url('cart')}}>
                <button type="button" class="btn btn-info">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
               </a>
	           </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="/resto/public/myaccount">Hi {{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{url('logout')}}>Log Out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href={{url('login')}}>Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{url('register')}}>Register</a>
                </li>
            @endif
	        </ul>
	      </div>
		  </div>
	  </nav>