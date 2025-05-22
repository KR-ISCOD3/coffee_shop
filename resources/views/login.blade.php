<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee-Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('app.css')}} ">
    <!-- link css -->
</head>
<body>

    <div class="container font-nationalpark d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{route('login.store')}}" method="post" class="p-4 border rounded-2 shadow">
                @csrf
                <p class="mb-0 text-secondary">Please enter your details</p>
                <h2 class="mb-4">Welcome Back bro!</h2>

                <input type="text" name="user_or_email" class="form-control py-2 shadow-none border my-3" placeholder="Username Or Email">
                <input type="password" name="password" class="form-control py-2 shadow-none border mt-3 mb-1" placeholder="Passsword">
                <a href="#" class="text-pink-700 ">Forgot password?</a>
                
                <button class="btn w-100 bg-pink-700 text-light mt-2">Login</button>
                <p class="text-center mt-2">Don't have account? <a href="   {{route('register')}}" class="text-pink-700">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>

