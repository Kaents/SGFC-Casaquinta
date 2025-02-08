<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casaquinta - Iniciar Sesión</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p6N19LUqB+K3Zm/BkNfQun+M1gAodjX3gd+6zL4lmNhLLmNnQq1IVExJ7YVgQGzECml72k1lGFc7VgK1hBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Incluye el CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    <!-- Incluye el bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<br>
<br>

    
    <!-- Estilos adicionales personalizados -->
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }



        .login-wrapper {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;

}


.card-body {
    background-color: #449de0;
   
       
        }



.card-img-left {
    width: 45%;
    height: auto;
    /* Link to your background image using in the property below! */
    background-image: url('images/Logo_Caasaquinta.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat
    /*margin-bottom:-10%;
    margin-right: -4%;*/
      
      }

  
        

        .form-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 8px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-input:focus {
            border-color: #0056b3;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        .form-error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .form-input-checkbox {
            width: 16px;
            height: 16px;
            margin-right: 8px;
        }

        .form-label-checkbox {
            font-weight: 500;
            color: #2c3e50;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .btn-link {
            color: #0056b3;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .btn-link:hover {
            color: #004085;
        }

        .login-button {
            background-color: #5a7dbe;
            border: none;
            padding: 12px 20px;
            color: #ffffff;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s;
        }

      

        .login-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
       
        .btn-primary {
    background-color: #0d6efd;
}


    </style>
<body>




    <div class="login-container">
        
          
            
            <!-- Session Status -->
            @if(session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
</div>



      <div class="container">
      <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h4>Inicio de Sesion</h4>
             

                <!-- Email Address -->
                <div class="form-group">
                <i class="fa-solid fa-envelope fa-lg"></i> Correo
                    <label for="email" class="form-label"></label>
                    <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus aria-label="Email"> 
                    @if($errors->has('email'))
                        <span class="form-error">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                <i class="fa-solid fa-lock fa-lg"></i> Contraseña
                    <input id="password" type="password" name="password" class="form-input" required aria-label="Contraseña">
                    @if($errors->has('password'))
                        <span class="form-error">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="form-group remember-me">
                    <input id="remember_me" type="checkbox" name="remember" class="form-input-checkbox">
                    <label for="remember_me" class="form-label-checkbox">Recordarme</label>
                </div>

                <!-- Enlaces de Acciones y Botón de Envío -->
                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn-link">¿Olvidaste tu contraseña?</a>
                    @endif
                    <button type="submit" class="btn btn-primary login-button">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
