<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>SGI|Encuentro con Dios</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free-5.11.2-web/css/all.min.css')}}" />
  <!-- Google Fonts Roboto -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" /> --}}
  <!-- MDB -->
  <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
    crossorigin="anonymous"></script> --}}

    @section('css')
    @show
</head>

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="#" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="{{route('members.index')}}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('members*') ? 'active' : '' }} ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Miembros </span>
          </a>
          <a href="{{route('votes.index')}}" class="list-group-item list-group-item-action py-2 ripple  {{ Request::is('votes*','report*') ? 'active' : '' }} "><i
              class="fas fa-lock fa-fw me-3"></i><span>Votaciones</span></a>
          <a href="{{route('services.index')}}" class="list-group-item list-group-item-action py-2 ripple  {{ Request::is('services*') ? 'active' : '' }}"><i
              class="fas fa-chart-line fa-fw me-3"></i><span>Servicios</span></a>
          {{-- <a href="#" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a> --}}
          <a href="{{route('users.index')}}" class="list-group-item list-group-item-action py-2 ripple  {{ Request::is('users*') ? 'active' : '' }}"><i
              class="fas fa-users fa-fw me-3"></i><span>Usuarios</span></a>
         <a href="{{route('configs.create')}}" class="list-group-item list-group-item-action py-2 ripple  {{ Request::is('configs*') ? 'active' : '' }}"><i
              class="fas fa-globe  fa-fw me-3"></i><span>Configuraciones</span></a>
              <a href="{{route('logs')}}" class="list-group-item list-group-item-action py-2 ripple  {{ Request::is('logs*') ? 'active' : '' }}"><i
                class="fas fa-globe  fa-fw me-3"></i><span>Logs</span></a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img src="{{asset('img/logo/logo.png')}}" width="60" alt="" loading="lazy" />
        </a>
        <!-- Search form -->
        {{-- <form class="d-none d-md-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded"
            placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
          <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
        </form> --}}

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Some news</a></li>
              <li><a class="dropdown-item" href="#">Another news</a></li>
              <li>
                <a class="dropdown-item" href="#">Something else</a>
              </li>
            </ul>
          </li> --}}

          <!-- Icon -->
          {{-- <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="#">
              <i class="fas fa-fill-drip"></i>
            </a>
          </li> --}}
          <!-- Icon -->
          {{-- <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li> --}}

          <!-- Icon dropdown -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button"
              data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="united kingdom flag m-0"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                  <i class="fa fa-check text-success ms-2"></i></a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="china flag"></i>中文</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="japan flag"></i>日本語</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="germany flag"></i>Deutsch</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="france flag"></i>Français</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="spain flag"></i>Español</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="russia flag"></i>Русский</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="portugal flag"></i>Português</a>
              </li>
            </ul>
          </li> --}}

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="{{asset('img/Sample_User_Icon.png')}}" class="rounded-circle" height="30"
                alt="" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">{!! Auth::user()->name !!}</a></li>
              {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
              <li>
                {{-- <a class="dropdown-item" href="#">Logout</a> --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Salir') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
     @yield('content')
      </section>
      <!--Section: Statistics with subtitles-->
    </div>
  </main>
  <!--Main layout-->
  <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- MDB -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
  <!-- Custom scripts -->
  {{-- <script type="text/javascript" src="{{asset('js/admin.js')}}"></script> --}}
  <script>
    $(document).ready(function () {
        $(".btn-danger").click(function(e){
            e.preventDefault();
            let c = confirm("Va a eliminar un resgistro!\n Presione Ok para seguir");
            if(c){
                $(this).parents('form:first').submit();
            }

            });

    });

   </script>
  @section('script')
  @show
</body>

</html>
