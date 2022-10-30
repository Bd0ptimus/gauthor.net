<div class="Navbar_container" style="background-image:url('{{env('APP_URL')}}/loving-web/public/front/images/img_bg_2.jpg')">
    <div class="Navbar__Link Navbar__Link-brand">
        <img src="{{aaset('storage/icons/bear-icon.png')}}">
        <img src="{{asset('storage/icons/heart-icon.png')}}">
        <img src="{{asset('storage/icons/rabbit-icon.png')}}">
    </div>
    <div class="Navbar__Link Navbar__Link-toggle" onclick="classToggle()">
        <i class="fas fa-bars fa-2xl" style="margin-top:15px;"></i>
    </div>
    {{-- <nav class="Navbar__Items">
        <div class="Navbar__Link">
            Longer Link
        </div>
        <div class="Navbar__Link">
            Longer Link
        </div>
        <div class="Navbar__Link">
            Link
        </div>
    </nav> --}}

    <nav class="Navbar__Items Navbar__Items--right">
        <div class="Navbar__Link">
            <a class="nav-text" href="{{ route('main') }}">Home</a>
        </div>
        @if (App\Admin::user() !== null && App\Admin::user()->inRoles([ROLE_ADMIN]))
            <div class="Navbar__Link">
                <a class="nav-text" href="{{ route('profile.index') }}">Profile</a>
            </div>
            <div class="Navbar__Link">
                <a class="nav-text" href="{{ route('auth.logout') }}">Logout</a>
            </div>
        @else
            <div class="Navbar__Link">
                <a class="nav-text" href="{{ route('auth.login') }}">Login</a>
            </div>
        @endif


    </nav>
</div>
