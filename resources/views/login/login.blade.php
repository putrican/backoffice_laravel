<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blueray Cargo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ URL::to('/'); }}/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="{{ URL::to('/'); }}/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/css/main.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/css/dore.light.bluenavy.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/'); }}/css1/style.css" />
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">BLUERAY Cargo</p>

                            <p class="white mb-0">
                                Please use your credentials to login.
                                <br>If you are not a member, please
                                <a href="/register" class="white">register</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a class="navbar-logo" href="">
                                <span class="logo d-none d-xs-block"></span>
                                <span class="logo-mobile d-block d-xs-none"></span>
                            </a>
                            <h6 class="text-center mb-4 ">Login</h6>
                            <form action={{ route('login')}} method="post">
                                @csrf
                                <div class="form-floating">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="name@example.com" autofocus required value={{ old('email') }}>
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                {{--  

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" />
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" />
                                    <span>Password</span>
                                </label>  --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="d-block text-center mt-3">Not registered? <a href="/register">Register
                                            Now!</a></small>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>