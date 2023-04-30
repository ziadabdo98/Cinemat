<html lang="en">
@include('layouts.head')

<body>

    <!-- =============== START OF WRAPPER =============== -->
    <div class="wrapper">
        <main class="login-register-page"
            style="background-image: url({{ asset('images/branding/posters/movie-collection.webp') }})">
            <div class="container">

                <!-- =============== START OF LOGIN & REGISTER POPUP =============== -->
                <div class="small-dialog login-register">

                    <!-- ===== Start of Signup wrapper ===== -->
                    <div>
                        <div class="small-dialog-headline">
                            <h4 class="text-center">Sign Up</h4>
                        </div>

                        <div class="small-dialog-content">

                            <!-- Start of Registration form -->
                            <form id="registration_form" action="/register" method="POST">
                                @csrf

                                <p class="status"></p>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="first_name">First Name*</label>
                                        <input name="first_name" id="first_name" class="form-control" type="text"
                                            value="{{ old('first_name') }}" required />
                                        @include('components.error-message', [
                                            'field_name' => 'first_name',
                                        ])
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Last Name</label>
                                        <input name="last_name" id="last_name" class="form-control" type="text"
                                            value="{{ old('last_name') }}" />
                                        @include('components.error-message', ['field_name' => 'last_name'])
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username*</label>
                                    <input name="username" id="username" class="form-control" type="text"
                                        value="{{ old('username') }}" required />
                                    @include('components.error-message', ['field_name' => 'username'])
                                </div>

                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input name="email" id="email" class="form-control" type="email"
                                        value="{{ old('email') }}" required />
                                    @include('components.error-message', ['field_name' => 'email'])
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password">Password*</label>
                                        <input name="password" id="password" class="form-control" type="password"
                                            required />
                                        @include('components.error-message', ['field_name' => 'password'])
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="password_confirmation">ReEnter Password*</label>
                                        <input name="password_confirmation" id="password_confirmation"
                                            class="form-control" type="password" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role_id">Role*</label>
                                    <select name="role_id" id="role_id" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @include('components.error-message', ['field_name' => 'role_id'])
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-main btn-effect nomargin" value="Register" />
                                </div>
                            </form>
                            <!-- End of Registration form -->

                            <div class="bottom-links">
                                <span>
                                    Already have an account?
                                    <a href="{{ route('login') }}">Sign in</a>
                                </span>
                            </div>

                        </div> <!-- .small-dialog-content -->

                    </div>
                    <!-- ===== End of Signup wrapper ===== -->


                    <!-- ===== Start of Forget Password wrapper ===== -->
                    <div class="forgetpassword-wrapper">
                        <div class="small-dialog-headline">
                            <h4 class="text-center">Forgotten Password</h4>
                        </div>

                        <div class="small-dialog-content">

                            <!-- Start of Forger Password form -->
                            <form id="forget_pass_form" action="#" method="post">
                                <p class="status"></p>

                                <div class="form-group">
                                    <label for="password">Email Address *</label>
                                    <input type="email" name="user_login" class="form-control" id="email3"
                                        placeholder="Email Address *" />
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Get New Password"
                                        class="btn btn-main btn-effect nomargin" />
                                </div>
                            </form>
                            <!-- End of Forger Password form -->

                            <div class="bottom-links">
                                <a class="cancelClick">Cancel</a>
                            </div>

                        </div><!-- .small-dialog-content -->

                    </div>
                    <!-- ===== End of Forget Password wrapper ===== -->

                </div>
                <!-- =============== END OF LOGIN & REGISTER POPUP =============== -->

                <a href={{ route('home') }} class="text-white">Back to Home</a>
            </div>
        </main>
    </div>
    <!-- =============== END OF WRAPPER =============== -->

    @include('layouts.includes')
</body>

</html>
