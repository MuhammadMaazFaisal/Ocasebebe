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
                        <form id="v-form" class="mb-0" action="{{ route('verify.code') }}" method="POST">
                            @csrf
                            <p>
                                Please enter the verification code sent to your email address.
                            </p>
                            <div class="form-group mb-0">
                                <label for="v-code" class="font-weight-normal">Verification Code</label>
                                <input type="text" class="form-control" id="v-code" name="code" required />
                            </div>

                            <div class="form-footer mb-0">
                                <a href="{{ route('login') }}">Click here to login</a>
                                <button type="submit"
                                    class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
                                    Verify
                                </button>
                            </div>
                        </form>
                        <form id="update-form" class="d-none" class="mb-0" action="{{ route('change.password') }}"
                            method="POST">
                            @csrf
                            <p>
                                Update your password.
                            </p>
                            <div class="form-group mb-0">
                                <label for="new-password" class="font-weight-normal">New Password:</label>
                                <input type="password" class="form-control" id="new-password" name="new_password"
                                    required />
                                <label for="confirm-password" class="font-weight-normal">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm-password"
                                    name="confirm_password" required />
                            </div>
                            @if (session('status'))
                                <input type="hidden" name="code" value="{{ session('code') }}">
                            @endif

                            <div class="form-footer mb-0">
                                <button type="submit"
                                    class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
                                    Update Password
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
            var v_form = document.getElementById('v-form');
            var u_form = document.getElementById('update-form');
            v_form.classList.add('d-none');
            u_form.classList.remove('d-none');
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
@if (session('u-status'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('u-status') }}",
            icon: "success",
            button: "OK",
        }).then(function() {
            window.location.href = "{{ route('login') }}";
        });
    </script>
@endif
@if (session('u-error'))
    <script>
        swal({
            title: "Error!",
            text: "{{ session('u-error') }}",
            icon: "error",
            button: "OK",
        });
    </script>
@endif
