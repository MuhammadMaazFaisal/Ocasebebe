@include('layout.head')
@include('layout.navbar')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Login</h2>
                        </div>

                        <form action="#" id="login-form">
                            <label for="login-email">
                                Username or email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" name="email" id="login-email" required />

                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" name="password" id="login-password" required />

                            <div class="form-footer">
                                <div class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" id="lost-password" />
                                    <label class="custom-control-label mb-0" for="lost-password">Remember
                                        me</label>
                                </div>

                                <a href="forgot-password.html" class="forget-password text-dark form-footer-right">Forgot
                                    Password?</a>
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100">
                                LOGIN
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                        </div>

                        <form action="#" id="register-form">
                            <label for="register-email">
                                Email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" name="email" id="register-email" required />

                            <label for="register-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" name="password" id="register-password" required />

                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
@include('layout.footer')
<script>
    $(document).ready(function() {
        $("#login-form").submit(function(e) {
            e.preventDefault();
            var email = $("#login-email").val();
            var password = $("#login-password").val();
            $.ajax({
                url: "{{route('login')}}",
                type: "POST",
                data: {
                    email: email,
                    password: password,
                    _token: "{{csrf_token()}}"
                },
                success: function(response) {
                    console.log(response);
                    if (response['alert-type'] == "success") {
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: response.message,
                            icon: "error",
                            button: "OK",
                        }).then(function() {
                            window.location.reload();
                        });
                    }
                }
            });
        });

        $("#register-form").submit(function(e) {
            e.preventDefault();
            var email = $("#register-email").val();
            var password = $("#register-password").val();
            $.ajax({
                url: "{{route('register')}}",
                type: "POST",
                data: {
                    email: email,
                    password: password,
                    _token: "{{csrf_token()}}"
                },
                success: function(response) {
                    if (response['alert-type'] == "success") {
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: response.message,
                            icon: "error",
                            button: "OK",
                        }).then(function() {
                            window.location.reload();
                        });
                    }
                }
            });
        });
    });
</script>