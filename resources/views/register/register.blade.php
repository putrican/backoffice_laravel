<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BLUERAY Cargo</title>
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
                                Please use this form to register.
                                <br>If you are a member, please
                                <a href="" class="white">login</a>.
                            </p>
                        </div>
                        <div class="form-side">
                             <a class="navbar-logo" href="Dashboard.Default.html">
                                <span class="logo d-none d-xs-block"></span>
                                <span class="logo-mobile d-block d-xs-none"></span>
                            </a>
                            <h6 class="mb-4">Register</h6>

                            <form action="/register" method="post">
                                @csrf
                                <div class="form-floating">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid    
                @enderror"
                                        id="name" placeholder="Name" required value="{{ old('name') }}">
                                    <label for="name">Name</label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid
                    
                @enderror"
                                        id="username" placeholder="Username" required value="{{ old('username') }}">
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid
                    
                @enderror"
                                        id="email" placeholder="name@example.com" required
                                        value="{{ old('email') }}">
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid
                    
                @enderror"
                                        id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                            </form>
                            {{--  <form action="/register" method="post">
                                @csrf
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" />
                                    <span>Name</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" />
                                    <span>E-mail</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">REGISTER</button>
                                </div>
                            </form>  --}}
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
