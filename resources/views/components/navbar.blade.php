@auth('admins')
<nav class="navbar navbar__secondary">
  <div class="container container__wide">
    You’re signed in as an adminstrator.
    <ul class="navbar--nav navbar--nav__right">
      @if($view_name == 'opportunity-single')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('crud.opportunity.edit', ['opportunity' => $opportunity->id]) }}">Edit this
          opportunity</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="button button__inverted nav-button" href="{{ route('backpack') }}">Admin area</a>
      </li>
    </ul>
  </div>
</nav>
@endauth

<nav class="navbar navbar__primary navbar__{{ $view_name }}">
  <div class="container container__wide">
    <a class="navbar--brand" href="{{ url('/') }}">
      Volunteer <svg xmlns="http://www.w3.org/2000/svg" width="25.2" height="21" viewbox="0 0 25.2 21">
        <path fill="#FFF" d="M.6 5.7L16 11.3 0 15.1 1.4 21l23.4-5.5.2-3.5.2-3.8L2.6 0z" /></svg> Wakefield
    </a>
    <button class="navbar--toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <svg viewBox="0 0 18 15" width="18px" height="15px">
        <path fill="#ffffff"
          d="M18,1.484c0,0.82-0.665,1.484-1.484,1.484H1.484C0.665,2.969,0,2.304,0,1.484l0,0C0,0.665,0.665,0,1.484,0 h15.031C17.335,0,18,0.665,18,1.484L18,1.484z">
        </path>
        <path fill="#ffffff"
          d="M18,7.516C18,8.335,17.335,9,16.516,9H1.484C0.665,9,0,8.335,0,7.516l0,0c0-0.82,0.665-1.484,1.484-1.484 h15.031C17.335,6.031,18,6.696,18,7.516L18,7.516z">
        </path>
        <path fill="#ffffff"
          d="M18,13.516C18,14.335,17.335,15,16.516,15H1.484C0.665,15,0,14.335,0,13.516l0,0 c0-0.82,0.665-1.484,1.484-1.484h15.031C17.335,12.031,18,12.696,18,13.516L18,13.516z">
        </path>
      </svg>
    </button>

    <div class="navbar--navs">
      @if(!in_array($view_name, ['auth-login', 'auth-register']))
      <!-- Left Side Of Navbar -->
      <ul class="navbar--nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('opportunity.index')}}">Latest opportunities</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('organisation.index')}}">Covid community hubs</a>
        </li> --}}
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar--nav navbar--nav__right">
        <!-- Authentication Links -->


        @guest('web')
        <li class="nav-item">
          <a class="button button__inverted nav-button" href="{{ route('organisation.dashboard') }}">Add an
            opportunity</a>
        </li>
        @endguest
        @auth('web')

        {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
        </a> --}}

        {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('organisation.account') }}">Account</a>
        </li>
        @if(in_array($view_name,['organisation-dashboard','auth-verify']))
        <li class="nav-item">

          <a class="button button__inverted {{--dropdown-item--}}" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          {{-- </div> --}}
        </li>
        @else

        <li class="nav-item">
          <a class="button button__inverted nav-link" href="{{ route('organisation.dashboard') }}">Dashboard</a>
        </li>
        @endif

        @endauth
      </ul>
      @endif
    </div>
  </div>
</nav>