<html lang="en">
@include('layouts.head')
<body>

<!-- =============== START OF WRAPPER =============== -->
<div class="wrapper">
    <main class="login-register-page"
          style="background-image: url({{  asset('images/branding/posters/movie-collection.jpg')  }})">
        <div class="container">

            <!-- =============== START OF LOGIN & REGISTER POPUP =============== -->
            <div class="small-dialog login-register">

                <!-- ===== Start of Signin wrapper ===== -->
                <div class="signin-wrapper">
                    <div class="small-dialog-headline">
                        <h4 class="text-center">Sign in</h4>
                    </div>


                    <div class="small-dialog-content">

                        <!-- Start of Login form -->
                        <form id="login_form" method="post">
                            <p class="status"></p>

                            <div class="form-group">
                                <label for="username">Username or Email *</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Your Username or Email *"/>
                            </div>

                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Your Password *"/>
                            </div>

                            <div class="form-group">
                                <div class="checkbox pad-bottom-10">
                                    <input id="check1" type="checkbox" name="remember" value="yes">
                                    <label for="check1">Keep me signed in</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Sign in" class="btn btn-main btn-effect nomargin"/>
                            </div>
                        </form>
                        <!-- End of Login form -->

                        <div class="bottom-links">
                                <span>
                                    Not a member?
                                    <a class="signUpClick">Sign up</a>
                                </span>
                            <a class="forgetPasswordClick pull-right">Forgot Password</a>
                        </div>
                    </div>

                </div>
                <!-- ===== End of Signin wrapper ===== -->


                <!-- ===== Start of Signup wrapper ===== -->
                <div class="signup-wrapper">
                    <div class="small-dialog-headline">
                        <h4 class="text-center">Sign Up</h4>
                    </div>

                    <div class="small-dialog-content">

                        <!-- Start of Registration form -->
                        <form id="registration_form" action={{ route('register') }} method="POST">
                            @csrf

                            <p class="status"></p>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="first_name">First Name*</label>
                                    <input name="first_name" id="first_name" class="form-control"
                                           type="text" required/>
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" id="last_name" class="form-control"
                                           type="text"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Username*</label>
                                <input name="username" id="username" class="form-control"
                                       type="text" required/>
                            </div>

                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input name="email" id="email" class="form-control"
                                       type="email" required/>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password">Password*</label>
                                    <input name="password" id="password" class="form-control"
                                           type="password" required/>
                                </div>

                                <div class="form-group col-6">
                                    <label for="password_confirmation">ReEnter Password*</label>
                                    <input name="password_confirmation" id="password_confirmation" class="form-control"
                                           type="password" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role_id">Role*</label>
                                <select name="role_id" id="role_id" required>
                                    @foreach( $roles as $role)
                                        <option value={{ $role->id }}>{{ $role->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-main btn-effect nomargin" value="Register"/>
                            </div>
                        </form>
                        <!-- End of Registration form -->

                        <div class="bottom-links">
                                <span>
                                    Already have an account?
                                    <a class="signInClick">Sign in</a>
                                </span>

                            <a class="forgetPasswordClick pull-right">Forgot Password</a>
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
                                       placeholder="Email Address *"/>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Get New Password"
                                       class="btn btn-main btn-effect nomargin"/>
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

            <a href={{  route('home')  }} class="text-white">Back to Home</a>
        </div>
        <div class="fixed-bottom text-center font-weight-light">
            <a href={{  route('home')  }} class="text-secondary">Admin Sign in</a>
            {{-- TODO: add admin sign in route--}}
        </div>
    </main>
</div>
<!-- =============== END OF WRAPPER =============== -->

@include('layouts.includes')
</body>
</html>