@extends('layouts.member')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <nav class="navbar navbar-expand ">

                    <div class="collapse navbar-collapse" id="navbarsExample02">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                    </div>
                </nav>




                <div class="card">
                    <div class="card-header">YOU ARE REGISTERING FOR {{ $singleSite->name }}</div>
                    <div class="card-body">

                        <form action="/list-games-store" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="email"
                                    value="{{ old('email', Auth::user()->email) }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="siteid"
                                    value="{{ old('siteid', $singleSite->id) }}">
                                @error('siteid')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control username" name="username"
                                    value="{{ old('username') }}" autocomplete="chrome-off">
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation">
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('confirm_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning btn-block">REGISTER</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        const togglePassword = document.querySelectorAll('.toggle-password');

        togglePassword.forEach((element) => {
            element.addEventListener('click', () => {
                const input = element.closest('.input-group').querySelector('input');
                if (input.type === 'password') {
                    input.type = 'text';
                    element.querySelector('i').classList.remove('fa-eye');
                    element.querySelector('i').classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    element.querySelector('i').classList.remove('fa-eye-slash');
                    element.querySelector('i').classList.add('fa-eye');
                }
            });
        });

        document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');
    </script>
@endsection
