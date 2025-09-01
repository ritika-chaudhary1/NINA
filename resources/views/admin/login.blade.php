  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, rgb(43, 37, 37) 0%, rgb(77, 68, 68) 100%);
            font-family: 'Poppins', sans-serif;
        }
        .login-box {
            background: #fff;
            border-radius: 12px;
            padding: 40px 30px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
           
        }
        /* .login-box img {
            width: 80px;
            margin-bottom: 10px;
        } */
        .login-box h3 {
            font-weight: 400;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 25px;
            padding: 8px;
            background: #f3f3f3;
            border: none;
            box-shadow: none;
            font-size: 15px;
        }
        .form-control:focus {
            background: #fff;
            border: 1px solid #2575fc;
            box-shadow: none;
        }
        .btn-login {
            border-radius: 25px;
            padding: 10px;
            background: #28a745;
            border: none;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }
        .btn-login:hover {
            background: #218838;
        }

/* Outer rounded border with white background */
.icon-outer {
    /* background: #dccdcd;
    border-radius: 50%; */
    padding: 40px; 
    display: inline-block;
   
}

/* Inner dark rectangle with icon */
.icon-inner {
    background: #212529; 
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px; 
    
}

.icon-inner img {
    width: 40px;
    height: 40px;
}

  </style>
</head>
<body>

  <div class="login-box ">
    <!-- Icon with layered borders -->
    <div class="icon-outer">
        <div class="icon-inner">
            <img src="https://img.icons8.com/ios-filled/100/000000/user.png" alt="User Icon">
        </div>
    </div>
        <h3>Admin Login</h3>

   
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                placeholder="Email" 
                value="{{ old('email') }}" 
                required 
                autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input 
                type="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="Password" 
                required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
   <button type="submit" class="btn btn-login w-100">LOGIN</button>
    </form>

  
</div>

</body>
</html>
