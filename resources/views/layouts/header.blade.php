<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    @stack('title')
  </title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="/assets/css/style.css">

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- RemixIcon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
    integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header>

    <div class="container">

      <a href="#" class="logo">
        <img src="/assets/images/logo.png" alt="OpenNotes logo">
      </a>

      <div class="header-right">

        <div class="header-nav-wrapper">

          <button class="navbar-toggle-btn" data-navbar-toggle-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

          <nav class="navbar" data-navbar>

            <ul class="navbar-list">

              <li>
                <a href="/" class="navbar-link">Home</a>
              </li>

              <li>
                <a href="/notes" class="navbar-link">Notes</a>
              </li>

              <!-- <li>
                <a href="#" class="navbar-link">Explore</a>
              </li>

              <li>
                <a href="#" class="navbar-link">Creators</a>
              </li>

              <li>
                <a href="#" class="navbar-link">Collections</a>
              </li>

              <li>
                <a href="#" class="navbar-link">Blog</a>
              </li> -->

              <li>
                <a href="#" class="navbar-link">Contact</a>
              </li>

            </ul>

          </nav>

        </div>

        <div class="header-actions">
          <input type="search" placeholder="Search" class="search-field">
          @if (Route::has('login'))
        @auth
      <a href="{{url('/login')}}"><button class="btn btn-primary">Dashboard</button></a>
    @else
    <a href="{{url('/login')}}"><button class="btn btn-primary">Sign in</button></a>
  @endauth

      @endif
        </div>
        

      </div>

    </div>

  </header>


  @if (session('message'))
    <script>
    Swal.fire({
      title: 'Success!',
      text: "{{ session('message') }}",
      icon: 'success',
      confirmButtonText: 'OK'
    });
    </script>

  @elseif (session('note_add_msg'))
    <script>
    Swal.fire({
      title: 'WOW, YOU GOT 20 POINTS!',
      text: "{{ session('note_add_msg') }}",
      icon: 'success',
      confirmButtonText: 'OK',
      backdrop: `
      rgba(0,0,123,0.4)
      url("/assets/images/party.gif")
      left top
      no-repeat
    `
    });
    </script>
  @elseif (session('error'))
    <script>
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "{{session('error')}}",
      footer: '<a href="mailto:purificationevan04@gmail.com">Why do I have this issue?</a>'
    });
    </script>

  @elseif (session('delete'))
    <script>
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
      confirmButton: "btn btn-primary",
      cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      swalWithBootstrapButtons.fire({
        title: "Deleted!",
        text: "{{session('delete')}}",
        icon: "success"
      });
      } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
      ) {
      swalWithBootstrapButtons.fire({
        title: "Cancelled",
        text: "Your imaginary file is safe :)",
        icon: "error"
      });
      }
    });
    </script>
  @endif