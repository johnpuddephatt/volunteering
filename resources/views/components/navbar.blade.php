@auth('admins')
  <nav class="navbar navbar__secondary">
    <div class="container">
      You’re signed in as an adminstrator.
      <ul class="navbar--nav navbar--nav__right">
        @if($view_name == 'opportunity-single')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('crud.opportunity.edit', ['opportunity' => $opportunity->id]) }}">Edit this opportunity</a>
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
  <div class="container">
    <a class="navbar--brand" href="{{ url('/') }}">
        Volunteer <svg xmlns="http://www.w3.org/2000/svg" width="25.2" height="21" viewbox="0 0 25.2 21"><path fill="#FFF" d="M.6 5.7L16 11.3 0 15.1 1.4 21l23.4-5.5.2-3.5.2-3.8L2.6 0z"/></svg> Wakefield
    </a>
    <button class="navbar--toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar--toggler-icon"></span>
    </button>

    @if(!in_array($view_name, ['auth-login', 'auth-register']))
    <!-- Left Side Of Navbar -->
    <ul class="navbar--nav">
      <li class="nav-item">
        <a class="nav-link" href="/specialised/">Specialised opportunities</a>
      </li>
    </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar--nav navbar--nav__right">
          <!-- Authentication Links -->


          @guest('web')
            <li class="nav-item">
              <a class="button button__inverted nav-button" href="{{ route('organisation.dashboard') }}">Add an opportunity</a>
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

                <a class="button button__inverted {{--dropdown-item--}}" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
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
</nav>
