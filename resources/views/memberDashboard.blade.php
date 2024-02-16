@extends('layouts.member')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        .btn-label {
            position: relative;
            left: -12px;
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 3px 0 0 3px;
        }

        .btn-labeled {
            padding-top: 0;
            padding-bottom: 0;
        }

        .btn {
            margin-bottom: 10px;
        }
    </style>
    <hr>






    <div class="card card-primary" style="background-color: rgba(236, 236, 236, 0.5)">
        <div class="card-header mb-3">
            <a href="/list-games" class="btn btn-success btn-xs float-right">
                <i class="fas fa-plus"></i> | ADD GAMES
            </a>
            <h3 class="card-title ">YOUR GAME LIST</h3>
        </div>

        <div class="container">
            @foreach ($result as $item)
                @if ($item->isactive == 0)
                    {{-- <div class="row justify-content-center"> <!-- Added justify-content-center class -->
                        <div class="col-lg-6">
                            <div class="card " style="color:rgba(255, 255, 255, 0.1)">
                                <div class="card-body">

                                    <form action="/enable/{{ $item->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm float-right">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </form>

                                    <h5 class="card-subtitle mb-2" style="color: rgb(129, 129, 129)">{{ $item->name }}
                                        <small>Account Deactivated</small>
                                    </h5>
                                    <p class="card-text" style="color: rgb(129, 129, 129)">USERNAME: {{ $item->username }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                @else
                    <div class="row justify-content-center"> <!-- Added justify-content-center class -->
                        <div class="col-lg-6 ">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title mt-3">{{ $item->name }} <small style="color: green">(Active
                                            Account)</small></h5>
                                    <div class="iqamg-box float-right">
                                        <img src="{{ asset('uploads/') }}/{{ $item->image }}" style="width: 50px"
                                            alt="">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/deactivate/{{ $item->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            style="position:absolute; right: 0; margin-right: 15px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                    <button class="btn btn-secondary btn-xs  copyuserName"
                                        data-username="{{ $item->username }}" style="width: 10em"><i
                                            class="fas fa-copy"></i> | COPY</button>


                                    <div class="card-text" style="font-size: 20px">USERNAME: {{ $item->username }} </div>
                                    <div class="card-text">PASSWORD:
                                        {{ substr($item->password, 0, 4) . str_repeat('*', strlen($item->password) - 4) }}
                                    </div>





                                    <br>

                                    @if ($item->sitestatus == 0)
                                        <h5 style="color: red">PENDING FOR APPROVAL. PLEASE CONTACT CHAT SUPPORT</h5>
                                        <a href="http://m.me/159128657276843" class="btn btn-outline-success"
                                            target="_blank">FB MESSEGER</a>
                                    @else
                                        <a href="{{ $item->link }}" class="btn btn-outline-success btn-lg btn-block mb-1"
                                            target="_blank"><i class="fas fa-sign-in-alt"></i> | LOGIN SITE</a>
                                        <a href="/co-request/{{ $item->username }}"
                                            class="btn btn-outline-info btn-lg btn-block mb-1"> <i
                                                class="fas fa-cash-register"></i> | WITHDRAW</a>
                                        <a href="/ci-request/{{ $item->id }}"
                                            class="btn btn-outline-warning btn-lg btn-block mb-1"><i
                                                class="fas fa-shopping-cart"></i> | BUY CREDITS</a>

                                        <button type="button" class="btn btn-labeled btn-success">
                                            <span class="btn-label"> <i class="fas fa-sign-in-alt"></i>
                                            </span>Success
                                        </button>
                                        <button type="button" class="btn btn-labeled btn-primary">
                                            <span class="btn-label"> <i class="fas fa-sign-in-alt"></i>
                                            </span>Success
                                        </button>
                                        <button type="button" class="btn btn-labeled btn-outline-warning">
                                            <span class="btn-label"> <i class="fas fa-sign-in-alt"></i>
                                            </span>Success
                                        </button>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            @endforeach

            <br>
        </div>
    </div>



    <div class="modal fade" id="announcement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Announcement</h5>
                    <button type="button" class="close closemmme" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger closemmme" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sessionExpired = sessionStorage.getItem('expired');
            if (sessionExpired) {
                $("#announcement").modal({
                    backdrop: "static",
                    keyboard: false
                }).modal('toggle');

                $('.closemmme').on('click', function() {
                    $('#announcement').modal('toggle')
                });

                sessionStorage.removeItem('expired');
            }
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



    <script>
        $('.copyuserName').on('click', function() {
            var clipb = $(this).attr('data-username');

            // Create a temporary input element
            var tempInput = $("<input>");

            // Set its value to the desired text
            tempInput.val(clipb);

            // Append it to the body element
            $('body').append(tempInput);

            // Select and copy the text from the temporary input element
            tempInput.select();
            document.execCommand("copy");

            // Remove the temporary input element from the DOM
            tempInput.remove();

            // Optionally, display a success message or perform any other actions
            alert("username copied to clipboard: " + clipb);
        });
    </script>
@endsection
