<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Visualisasi Profil Kesehatan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome & Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

  <style>

    .navbar-container {
      margin-left: 0 !important;
      width: 100% !important;
      position: sticky;
      top: 0;
      z-index: 1030;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      height: 70px;
    }

    .navbar-brand-text {
      font-weight: bold;
      font-size: 1.5rem;
      color: #16b3ac !important;
      font-family: 'Acme', serif;
      margin-left: 10px;
    }

    .navbar-link {
      position: relative;
      padding: 0.5rem 1rem;
      color: #555 !important;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .navbar-link:hover {
      color: #16b3ac !important;
      border-radius: 5px;
    }

    .navbar-link::before,
    .navbar-link::after {
      content: '';
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background-color: rgba(22, 179, 172, 0.7);
      transition: all 0.5s cubic-bezier(0.4, -1, 0.2, -1);
      z-index: 1;
      border-radius: 1px;
    }

    .navbar-link::before {
      top: 0;
    }

    .navbar-link::after {
      bottom: 0;
    }

    .navbar-link:hover::before,
    .navbar-link:hover::after {
      width: 50%;
    }

    .navbar-auth {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .btn-navbar-login, .btn-navbar-register {
      font-weight: 500;
      padding: 8px 35px;
      font-size: 1rem;
      border-radius: 30px;
      transition: all 0.3s ease-in-out;
    }

    .btn-navbar-login {
      background-color: white;
      color: #16b3ac;
    }

    .btn-navbar-register {
      background-color: #16b3ac;
      color: white;
    }

    .btn-navbar-login:hover,
    .btn-navbar-register:hover {
      background-color: #16b3ac;
      color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transform: translateY(-2px);
    }

    .btn-navbar-login:hover + .btn-navbar-register {
      background-color: white;
      color: #16b3ac;
    }
  </style>
</head>
<body>

  <nav class="navbar-container navbar navbar-expand navbar-white navbar-light">
    <div class="container-fluid d-flex justify-content-between align-items-center px-3">

      <!-- Branding -->
      <div class="d-flex align-items-center">
        <a href="{{ url('/') }}" class="navbar-brand navbar-brand-text d-flex align-items-center h-100">VISKES LAMO</a>
      </div>

      <!-- Menu Utama -->
      <div class="d-none d-sm-flex align-items-center gap-3">
        <a href="{{ url('/beranda') }}" class="nav-link navbar-link">Beranda</a>
        <a href="{{ url('/beranda#dataCards') }}" class="nav-link navbar-link">Catalog Data</a>
        <a href="{{ url('/beranda#sumberdataCards') }}" class="nav-link navbar-link">Sumber Data</a>
      </div>

      <!-- Auth Buttons -->
      <div class="navbar-auth">
          @guest
              <a href="{{ url('/login') }}" class="btn btn-navbar-login btn-sm">Login</a>
              <a href="{{ url('/register') }}"  class="btn btn-navbar-register btn-sm">Register</a>
          @else
              <span class="mr-2 font-weight-bold">{{ Auth::user()->name }}</span>
              <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin mau logout?')">
                  @csrf
                  <button type="submit" class="btn btn-navbar-register btn-sm">Logout</button>
              </form>
          @endguest
      </div>


    </div>
  </nav>

</body>
</html>

