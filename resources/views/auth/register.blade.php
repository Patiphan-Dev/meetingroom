<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิก</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Ionicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- sweetalert2 -->
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <section class="register">
            <div class="wrap my-3 p-5">
                <div class="row g-3">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">สมัครสมาชิก</h3>
                        </div>
                        <div class="w-100">
                            <p class="d-flex justify-content-end">
                                <a href="{{ route('home') }}" class="d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-house-chimney mx-1"></i> หน้าแรก
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">

                        <form action="{{ route('postRegister') }}" method="post" class="row signin-form">

                            @csrf
                            @if ($message = Session::get('error'))
                                <span class="text-center text-danger">{{ $message }}</span>
                            @endif
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="username">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Username" id="username" name="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="password">รหัสผ่าน</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="password_confirmation">ยืนยันรหัสผ่าน </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirm Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="fullname">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    placeholder="fullname" id="fullname" name="fullname" value="{{ old('fullname') }}">
                                @if ($errors->has('fullname'))
                                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="phone">เบอร์โทร</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="phone" id="phone" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="housenumber">บ้านเลขที่</label>
                                <input type="text" class="form-control @error('housenumber') is-invalid @enderror"
                                    placeholder="housenumber" id="housenumber" name="housenumber"
                                    value="{{ old('housenumber') }}">
                                @if ($errors->has('housenumber'))
                                    <span class="text-danger">{{ $errors->first('housenumber') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="village">หมู่บ้าน</label>
                                <input type="text" class="form-control @error('village') is-invalid @enderror"
                                    placeholder="village" id="village" name="village"
                                    value="{{ old('village') }}">
                                @if ($errors->has('village'))
                                    <span class="text-danger">{{ $errors->first('village') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="road">ถนน</label>
                                <input type="text" class="form-control @error('road') is-invalid @enderror"
                                    placeholder="road" id="road" name="road" value="{{ old('road') }}">
                                @if ($errors->has('road'))
                                    <span class="text-danger">{{ $errors->first('road') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="subdistrict">ตำบล/แขวง</label>
                                <input type="text" class="form-control @error('subdistrict') is-invalid @enderror"
                                    placeholder="subdistrict" id="subdistrict" name="subdistrict"
                                    value="{{ old('subdistrict') }}">
                                @if ($errors->has('subdistrict'))
                                    <span class="text-danger">{{ $errors->first('subdistrict') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-3">
                                <label class="label" for="district">อำเภอ/เขต</label>
                                <input type="text" class="form-control @error('district') is-invalid @enderror"
                                    placeholder="district" id="district" name="district"
                                    value="{{ old('district') }}">
                                @if ($errors->has('district'))
                                    <span class="text-danger">{{ $errors->first('district') }}</span>
                                @endif
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 mb-5">
                                <label class="label" for="province">จังหวัด</label>
                                <input type="text" class="form-control @error('province') is-invalid @enderror"
                                    placeholder="province" id="province" name="province"
                                    value="{{ old('province') }}">
                                @if ($errors->has('province'))
                                    <span class="text-danger">{{ $errors->first('province') }}</span>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-5"
                                        value="สมัครสมาชิก">
                                </div>
                            </div>
                        </form>
                        <p class="text-center">มีบัญชีแล้ว ? <a data-toggle="tab"
                                href="{{ route('getLogin') }}">เข้าสู่ระบบ</a></p>
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
