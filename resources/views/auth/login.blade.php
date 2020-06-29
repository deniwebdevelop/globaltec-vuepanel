<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/login.css') }}"> 
 
    </head>
    <body>
        <main class="d-flex align-items-center min-vh-100">
            <div class="container text-white">
              <div class="card login-card" style="  background-image: linear-gradient(200deg, #2e95fcd3 1%, rgb(3, 12, 29)100%);">
                <div class="row">
                  <div class="col-md-5 bg-light">
                    <img src="{{ asset('backend/dist/img/axis.jpg') }}" alt="login" class="login-card-img" style="padding: 10%">
                  </div>
                  <div class="col-md-6 offset-1">
                    <div class="card-body">
                      <div class="brand-wrapper">
                            <h2 class="text-white" style="font-family: 'Satisfy', cursive; font-size:50px; padding-left:30%; padding-bottom:5%"> Axis</h2>
                      </div>
                      <p class="login-card-description"></p>
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                          <div class="form-group">
                            <label for="email" class="sr-only">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                          <div class="form-group mb-4">
                            <label for="password" class="sr-only">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <button type="submit" class="btn btn-light btn-light">
                            {{ __('Ingresar') }}
                        </button>
                        </form><br>
                        <p></p>

                        <nav class="login-card-footer-nav">
                          <a class="text-decoration-none text-light" href="http://www.globaltectrade.com.ar" target="_blank">Todos los derechos reservados ©️ Axis</a>
                        </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      </body>
      </html>
      