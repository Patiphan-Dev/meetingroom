<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ล็อคอิน</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Ionicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.jpg') }}">
    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- sweetalert2 -->
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <section class="">
            <div class="wrap my-3 p-5">
                <div class="row justify-content-center">

                    <div class="col-12 mb-4">
                        <div class="row text-center my-3">
                            <h1>ตารางการใช้งานหอประชุม</h1>
                        </div>
                        <div id="carouselrooms" class="carousel slide rounded-5">
                            <div class="carousel-inner">
                                @foreach ($rooms as $key => $row)
                                    @php
                                        $image = explode(',', $row->room_img_path);
                                    @endphp
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset($image[0]) }}" class=" rounded-5 img-thumbnail d-block w-100"
                                            alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h2>{{ $row->row_name }}</h2>
                                        </div>
                                    </div>
                                @endforeach

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselrooms"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselrooms"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 p-3 p-md-5 ">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">เข้าสู่ระบบ</h3>
                            </div>
                            <div class="w-100">
                                <p class="d-flex justify-content-end">
                                    <a href="{{ route('home') }}"
                                        class="nav-link d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-house-chimney mx-1"></i> หน้าแรก
                                    </a>
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('postLogin') }}" method="post" class="signin-form">
                            @csrf
                            @if ($message = Session::get('error'))
                                <span class="text-center text-danger">{{ $message }}</span>
                            @endif
                            <div class="form-group mb-3">
                                <label class="label" for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Username" id="username" name="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary rounded submit px-3"
                                    value="เข้าสู่ระบบ">
                            </div>
                        </form>
                        <p class="text-center">ไม่ใช่สมาชิก ? <a data-toggle="tab"
                                href="{{ route('getRegister') }}">สมัครสมาชิก</a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</body>

</html>
