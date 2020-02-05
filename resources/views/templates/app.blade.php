<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <title> Naoyuki Academic Center</title>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif
  </head>
  <body class="active-sidenav">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top shadow-sm bg-white p-0">
      <a class="navbar-brand ml-3 text-md-center" href="#">Naoyuki</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto invisible">
        </ul>
        <ul class="navbar-nav my-2 my-lg-0 mr-2">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="bell" data-count=0></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" id="notificationsMenu">
                <div class="dropdown-item">No notifications</div>
              <!-- <div class="dropdown-divider"></div> -->
              <!-- <a class="dropdown-item" href="#">Something has changed please check here</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo auth()->user()->name; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" id="notificationsMenu">
              <a class="dropdown-item" href="{{url('profil')}}">Edit Profil</a>
              <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
              <!-- <div class="dropdown-divider"></div> -->
              <!-- <a class="dropdown-item" href="#">Something has changed please check here</a> -->
            </div>
          </li>
        </ul>
      </div>
    </nav>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar shadow">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('dashboard')}}">
                <i data-feather="home" class="small"></i>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseMarket">
                <i data-feather="bar-chart-2"></i>
                Marketing & Strategy
                <i data-feather="chevron-down" class="small mt-1 float-right"></i>
              </a>
              <div class="collapse" id="collapseMarket">
                <a class="nav-link ml-3" href="{{ url('targetmarket') }}">
                  <i data-feather="target"></i>
                  Target Market
                </a>
                <a class="nav-link ml-3" href="{{ url('potentialmarket') }}">
                  <i data-feather="trending-up"></i>
                  Potential Market
                </a>
                <a class="nav-link ml-3" href="{{ url('leverage') }}">
                  <i data-feather="paperclip"></i>
                  Leverage
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseAcademic">
                <i data-feather="layers"></i>
                Academic
                <i data-feather="chevron-down" class="small mt-1 float-right"></i>
              </a>
              <div class="collapse" id="collapseAcademic">
                <a class="nav-link ml-3" href="{{ url('student') }}">
                  <i data-feather="list"></i>
                  Students
                </a>
                <a class="nav-link ml-3" href="{{ url('class') }}">
                  <i data-feather="book"></i>
                  Class
                </a>
                <a class="nav-link ml-3" href="{{ url('other') }}">
                  <i data-feather="book-open"></i>
                  Other Materi
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseHR">
                <i data-feather="user"></i>
                Human Resource
                <i data-feather="chevron-down" class="small mt-1 float-right"></i>
              </a>
              <div class="collapse" id="collapseHR">
                <a class="nav-link ml-3" href="{{ url('staff') }}">
                  <i data-feather="users"></i>
                  Staff
                </a>
                <a class="nav-link ml-3" href="{{ url('teacher') }}">
                  <i data-feather="user-check"></i>
                  Teacher
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseFinance">
                <i data-feather="dollar-sign"></i>
                Finance
                <i data-feather="chevron-down" class="small mt-1 float-right"></i>
              </a>
              <div class="collapse" id="collapseFinance">
                <a class="nav-link ml-3" href="{{ url('cashflow') }}">
                  <i data-feather="pie-chart"></i>
                  Cash Flow
                </a>
              </div>
               <div class="collapse" id="collapseFinance">
                <a class="nav-link ml-3" href="{{ url('payment') }}">
                  <i data-feather="pie-chart"></i>
                  Payment
                </a>
              </div>
               <div class="collapse" id="collapseFinance">
                <a class="nav-link ml-3" href="{{ url('payroll') }}">
                  <i data-feather="pie-chart"></i>
                  Payroll
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseSettings">
                <i data-feather="settings"></i>
                Settings
                <i data-feather="chevron-down" class="small mt-1 float-right"></i>
              </a>
              <div class="collapse" id="collapseSettings">
                <a class="nav-link ml-3" href="{{ url('class/create') }}">
                  <i data-feather="file-plus"></i>
                  Class
                </a>
              </div>
              <div class="collapse" id="collapseSettings">
                <a class="nav-link ml-3" href="{{ url('program') }}">
                  <i data-feather="file-plus"></i>
                  Program
                </a>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="{{url('logout')}}">
                <i data-feather="log-out"></i>
                Logout
              </a>
            </li> -->
          </ul>
        </div> 
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
          <h4>@yield('header')</h4>
        </div>
        <div class="container">
          @yield('content')
        </div>
      </main>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
</body>

</html>