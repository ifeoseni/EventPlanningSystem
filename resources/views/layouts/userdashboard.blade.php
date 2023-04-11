<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        /* Reset Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Global Styles */
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  color: #333;
}

a {
  color: #007bff;
  text-decoration: none;
}

/* Layout Styles */
.container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Component Styles */
.btn {
  display: inline-block;
  padding: 0.5rem 1rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  user-select: none;
  background-color: #007bff;
  border: 1px solid #007bff;
  border-radius: 0.25rem;
  color: #fff;
}

.form-control {
  display: block;
  width: 100%;
  height: calc(2.25rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
  background-color: transparent;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

/* Responsive Styles */
@media (max-width: 767px) {
  .sidebar {
    display: none;
  }
}

/* Custom Styles */
.logo {
  font-size: 2rem;
  font-weight: 700;
  color: #007bff;
}

    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    @yield('head')
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Logout</a>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

                @if(Auth::user()->role == 2){{-- Auth::id() == 1 for event owners --}}

                    <li class="nav-item">
                        <a class="nav-link" href="#">Create Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Create Budget</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Book Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Guest List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Create Event Website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Find Event Center</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tellStory')}}">Tell Your Event Story</a>
                    </li>

                @elseif (Auth::user()->role  == 1){{--Auth::id() == 1) for event vendors --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Role 1 vendor Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tell Your Vendor Story</a>
                </li>
                @elseif (Auth::user()->role  == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="#">Event Center</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                @elseif (Auth::user()->role  == 4){{-- for Admin --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.homepage') }}">Home Page </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addEventCenterAdmin') }}">Add Event Center</a>
                    </li>
                @else
                    I don't have any records!
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('addEventType') }}">Event Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('addVendorType') }}">Vendor Type</a>
                </li>


              <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('page-title')</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              @yield('toolbar')
            </div>
          </div>

          @yield('content')
        </main>
      </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
      <div class="container">
        <span class="text-muted">&copy; {{ date('Y') }} Admin Dashboard</span>
      </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
  </body>
</html>
