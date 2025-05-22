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
        <div class="col-4 ">
            <form action="{{route('register.store')}}" method="POST" class="p-4 border rounded-2 shadow">
                @csrf
                <!-- Message Alert -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="mb-0 text-secondary">Please enter your infromation</p>
                <h2 class="mb-4">Create an account!</h2>

                <label for="" class="form-label fw-medium">Username*:</label>
                <input type="text" name="name" class="form-control py-2 shadow-none border mb-3" placeholder="Username">

                <label for="" class="form-label fw-medium">Gender*:</label>
                <select name="gender_id" id="" class="form-select py-2 shadow-none border mb-3">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <label for="" class="form-label fw-medium">Email*:</label>
                <input type="email" name="email" class="form-control py-2 shadow-none border mb-3" placeholder="Email">

                <label for="" class="form-label fw-medium">Passsword*:</label>
                <input type="password" name="password" class="form-control py-2 shadow-none border mb-3" placeholder="Passsword">

                <button  class="btn w-100 bg-pink-700 text-light">
                    <span id="btnText">Register</span>
                    <div id="spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                </button>
                <p class="text-center mt-2">Already have account? <a href="{{route('login')}}" class="text-pink-700">Login</a></p>
            </form>
        </div>
    </div>
</body>
<script>
    
    function handleSubmit(event) {
        const btn = document.getElementById("registerBtn");
        const spinner = document.getElementById("spinner");
        const btnText = document.getElementById("btnText");

        btn.disabled = true;
        spinner.classList.remove("d-none");
        btnText.textContent = "Registering...";
    }
</script>
</html>
