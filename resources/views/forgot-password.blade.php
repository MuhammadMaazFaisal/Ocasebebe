@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('filter/') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container reset-password-container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="feature-box border-top-primary">
                    <div class="feature-box-content">
                        <form class="mb-0" action="{{ route('forgot.password_email') }}" method="POST">
                            @csrf
                            <p>
                                Lost your password? Please enter your email address. You will receive
                                a verification code to create a new password via email.
                            </p>
                            <div class="form-group mb-0">
                                <label for="reset-email" class="font-weight-normal">Email</label>
                                <input type="email" class="form-control" id="reset-email" name="email" required />
                            </div>

                            <div class="form-footer mb-0">
                                <a href="{{ route('login') }}">Click here to login</a>
                                <button type="submit"
                                    class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
@include('layouts.footer')
@if (session('status'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('status') }}",
            icon: "success",
            button: "OK",
        }).then(function() {
            console.log('success');
            window.location.href = "{{ route('update.password') }}";
        });
    </script>
@endif
@if (session('error'))
    <script>
        swal({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            button: "OK",
        });
    </script>
@endif
