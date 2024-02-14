@extends('layouts.member')

@section('content')


    <script>
        function handleResponse(response) {
            if (response.success) {
                var successMsg = document.getElementById('success-message');
                var dataInfo = document.getElementById('data-info');

                successMsg.innerText = response.success;
                dataInfo.innerText = JSON.stringify(response.data);
            } else if (response.error) {
                alert('Error: ' + response.error);
            }
        }
    </script>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">


                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif


                <div class="card">
                    <div class="card-header">CASHOUT REQUEST</div>
                    <div class="card-body">

                        <form action="/co-request" method="POST">
                            @csrf

                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <input type="hidden" name="siteId" value="{{ $site }}">

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $username }}"
                                    autocomplete="off" readonly>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="number" class="form-control" name="amount" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">E-WALLET</label>
                                        <select class="form-control" name="bankname" id="">
                                            <option value="GCASH" selected>GCASH</option>
                                            <option value="PAYMAYA">PAYMAYA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Account No.</label>
                                <input type="number" class="form-control" name="accountno">
                            </div>

                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="text" class="form-control" name="fullname" autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-warning btn-lg btn-block"
                                onclick="this.disabled=true; this.innerHTML='Processing...'; this.form.submit();">
                                SUBMIT
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div>











        <script>
            document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');
        </script>
    @endsection
