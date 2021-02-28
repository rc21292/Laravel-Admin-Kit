<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}" />

    <title>Sign In |AdminKit Laravel</title>

    <link href="{{asset('css/master.css')}}" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="{{asset('img/icons/login.png')}}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="mb-3">

                                            <label class="form-label">Email</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-text">
                                                    <i class="align-middle mr-2" data-feather="mail"></i>
                                                </div>
                                                <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" value="{{ old('email', null) }}" autofocus/>
                                                @if($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-text">
                                                    <i class="align-middle mr-2" data-feather="lock"></i>
                                                </div>
                                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" />
                                                @if($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                                @endif
                                            </div>
                                            <small>
                                                <a href="{{ route('password.request') }}">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember" name="remember" checked>
                                                <span class="form-check-label">
                                                  Remember me
                                              </span>
                                          </label>
                                      </div>
                                      <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>