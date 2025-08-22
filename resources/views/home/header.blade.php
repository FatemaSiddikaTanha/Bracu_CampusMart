<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home Page <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <div class="user_option">
              @if (Route::has('login'))
                  @auth

                    <a href="{{url('myorders')}}">My Orders</a>

                    <a href="{{url('mycart')}}">
                       <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                       [{{$count}}]
                    </a>
                    <a href="{{url('profile')}}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                   Profile
                   </a>
                    <a href="{{ route('messages.index') }}" style="margin-left: 10px;">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                      Messages
                       </a>
                      <form style="padding:13px" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input class="btn btn-success" type="submit" value="Logout">
                      </form>
                  @else
                      <a href="{{ route('login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Login</span>
                      </a>

                      @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                          <i class="fa fa-vcard" aria-hidden="true"></i>
                          <span>Register</span>
                        </a>
                        
                      @endif
                  @endauth
              @endif
          </div>

            
            
          </div>
        </div>
      </nav>
    </header>