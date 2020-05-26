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
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
              <div class="card login-card">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img src="{{ asset('frontend/assets/images/traffic.jpg') }}" alt="login" class="login-card-img">
                  </div>
                  <div class="col-md-6" style="margin-left: 90px;">
                    <div class="card-body">
                      <div class="brand-wrapper py-4">
                            <h2 style="font-family: 'Satisfy', cursive; font-size:40px;">Global Tec Trade</h2>
                      </div>
                      <p class="login-card-description">Bienvenido</p>
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

                        <button type="submit" class="btn btn-dark btn-black">
                            {{ __('Ingresar') }}
                        </button>
                        </form><br>
                        <p>Ingresa a tu cuenta</p>

                        <nav class="login-card-footer-nav">
                          <a class="text-decoration-none" href="http://www.globaltectrade.com.ar" target="_blank">Todos los derechos reservados ©️ Global Tec Trade</a>
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
      