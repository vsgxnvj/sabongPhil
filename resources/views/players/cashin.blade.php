@extends('layouts.member')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
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


                <section class="content">
                    <div class="container-fluid">
                        <div class="row">


                            {{-- <button class="btn btn-outline-info btn-block btn-lg mb-3" data-toggle="modal"
                                data-target="#mopModal">MODE OF PAYMENT</button> --}}

                            <div class="card card-info ">
                                <div class="card-header">
                                    <h3 class="card-title ">MODE OF PAYMENT</h3>
                                </div>
                                <div class="card-body ">

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div><strong>{{ $mop->first()->bankname }} NO.:</strong>
                                                {{ $mop->first()->accountno }} - <button
                                                    class="btn btn-info btn-xs copyclipb"
                                                    data-number="{{ $mop->first()->accountno }}" style="width: 10em">
                                                    COPY</button></div>
                                            <div>
                                                <h5><strong>{{ $mop->first()->fullname }}</strong></h5>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div>Please remember to download or capture a screenshot of the receipt and
                                                attach it
                                                below. We appreciate your attention to this matter!</div>

                                        </div>

                                    </div>

                                    {{-- <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" value="09350083675" readonly>
                                    <span class="input-group-append">
                                        <button type="button"
                                            class="btn btn-info btn-flat">Copy</button>
                                    </span>
                                </div> --}}
                                </div>


                            </div>


                            <div class="col-md-12">


                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">CREDITS TO: <small>{{ $getidsitesname->name }}
                                                ({{ $getemailsubs->username }})</small></h3>
                                    </div>


                                    <form action="/cashin-store" id="quickForm" enctype="multipart/form-data"
                                        method="POST">

                                        @csrf

                                        <div class="card-body">

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            <input type="hidden" class="" name="email"
                                                value="{{ $getemailsubs->email }}">
                                            <input type="hidden" class="" name="username"
                                                value="{{ $getemailsubs->username }}">
                                            <input type="hidden" class="" name="siteid"
                                                value="{{ $getidsitesname->id }}">


                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload Receipt</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input rounded-0"
                                                            id="exampleInputFile" name="fileimage">
                                                        <label class="custom-file-label" for="exampleInputFile"></label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        {{-- <span class="input-group-text">Upload</span> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box-item" style="display: none">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Amount</label>
                                                    <input type="number" name="amount" class="form-control rounded-0"
                                                        id="" placeholder="Enter Amount" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference No.</label>
                                                    <input type="number" name="refno" class="form-control rounded-0"
                                                        id="" placeholder="Enter Reference No." autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleSelectBorder">Receiver</label>
                                                    <select class="custom-select form-control-border" name="receiver">
                                                        <option
                                                            value="{{ $mop->first()->accountno }} - {{ $mop->first()->fullname }}"
                                                            selected>
                                                            {{ $mop->first()->accountno }} - {{ $mop->first()->fullname }}
                                                        </option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-warning btn-lg btn-block submitci"
                                                    onclick="this.disabled=true; this.innerHTML='Processing...'; this.form.submit();">
                                                    Submit
                                                </button>
                                            </div>


                                        </div>
                                    </form>
                                </div>

                            </div>






                            <hr>




                        </div>

                    </div>
                </section>

            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="mopModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-info ">
                        <div class="card-header">
                            <h3 class="card-title ">MODE OF PAYMENT</h3>
                        </div>
                        <div class="card-body ">

                            <div class="card">
                                <div class="card-body text-center">
                                    <div><strong>GCASH NO.:</strong> 09350083675 - <button
                                            class="btn btn-info btn-xs copyclipb" data-number="09350083675"
                                            style="width: 10em"> COPY</button></div>
                                    <div>
                                        <h5><strong>JAYSON S</strong></h5>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div>Please remember to download or capture a screenshot of the receipt and attach it
                                        below. We appreciate your attention to this matter!</div>

                                </div>

                            </div>

                            {{-- <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" value="09350083675" readonly>
                                    <span class="input-group-append">
                                        <button type="button"
                                            class="btn btn-info btn-flat">Copy</button>
                                    </span>
                                </div> --}}
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        var input = document.getElementById('exampleInputFile');
        var label = document.querySelector('.custom-file-label');
        var boxItem = document.querySelector('.box-item');

        input.addEventListener('change', function() {
            label.innerText = input.files[0].name;
            previewImage(event);
            showBoxItem();
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function showBoxItem() {
            boxItem.style.display = 'block';
        }


        document.querySelector('.copyclipb').addEventListener('click', function() {
            var number = this.getAttribute('data-number');
            navigator.clipboard.writeText(number)
                .then(function() {
                    console.log('Value copied to clipboard: ' + number);
                    alert('Number Copied: ' + number);
                })
                .catch(function(error) {
                    console.error('Unable to copy value to clipboard: ', error);
                });
        });


        document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');
    </script>
@endsection
