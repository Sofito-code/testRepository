<!-- Menu -->

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="/css/images/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			@isset($categories)
                @foreach ($categories as $item)
                    <li><a href="{{ route('product.index')}}">{{$item->name}}</a></li>
                @endforeach
            @endisset
        </ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="/css/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+57 300-101-0000</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="#">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="/css/images/logo_1.png" alt=""></div>
						<div>Jhonatan Shop</div>
					</div>
				</a>
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
                    @isset($categories)
                        @foreach ($categories as $item)
                            <li><a href="{{ route('product.index')}}">{{$item->name}}</a></li>
                        @endforeach
                    @endisset
					
					
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input name="search" type="search" class="search_input" placeholder="Buscar productos" required="required">
						<button class="header_search_button"><img src="/css/images/search.png" alt=""></button>
					</form>
                </div>
                @guest
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">
                        <img src="/images/nav/buttonSignIn.png" width="150" height="100%">
                    </a>
                @endif
                <a class="nav-link" href="{{ route('login') }}">
                    <img src="/images/nav/buttonLogIn.png" width="90" height="100%">
                </a>
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true"
                style="color:black;font-size: 18px" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->is_admin == true)
                        <a class="dropdown-item" href="#">Configuración</a>
                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endguest
                {{-- Canasta --}}
                <div style="padding-right: 20px">                    
                    <a href="{{route('hamper.index')}}"
                    style="padding-right: 16px;padding-left: 16px; padding-top: 8px;padding-bottom: 8px;">
                        <div>
                            <img src="/images/nav/buttonHamper.png" alt="canasta" width="37" height="100%" >
                            <span class="badge badge-pill badge-success">{{ $itemHaperQuantity ?? ''}}</span>
                        </div>
                    </a>
                </div>
				
				
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="/css/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+57 300-101-0000</div>
				</div>
			</div>
		</div>
	</header>
