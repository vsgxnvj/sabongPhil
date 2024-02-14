@extends('layouts.member')
@section('content')
    <h4>CASHINS LIST FOR PROCESS</h4>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <div class="modal fade modalrcp" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Checking receipts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="/recieved" method="POST" style="position: absolute; top: 4em; left: 2em">
                        @csrf
                        <input type="hidden" name="subId" id="subId" value="">
                        <button type="submit" class="btn btn-warning btn-lg">MARK AS RECEIVED</button>
                    </form>

                    <form action="/rejected" method="POST" style="position: absolute; top: 4em; right: 2em">
                        @csrf
                        <input type="hidden" name="subId" id="subIdreject" value="">
                        <button type="submit" class="btn btn-danger btn-lg">MARK AS REJECT</button>
                    </form>
                    <br>

                    <a href="" class="igmgg" download><img src="" class="igmgg" style="width: 100%"
                            alt=""></a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>










    <table id="" class="table table-striped table-bordered example" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>amount</th>
                <th>receiver</th>
                <th>reciboimage</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($getallci as $item)
                @if ($item->ispending == 0)
                    <tr>
                        <td>{{ $item->username }} - <small>{{ $item->link }}</small></td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->receiver }}</td>
                        <td>
                            @if ($item->reciboimage == null)
                                NO IMAGE RECEIPT
                            @else
                                <button data-id="{{ $item->ciId }}"
                                    data-urlimg="{{ asset('uploads') }}/{{ $item->reciboimage }}"
                                    class="btn btn-outline-warning thisimg btn-block" data-toggle="modal"
                                    data-target=".modalrcp" data-backdrop="static" data-keyboard="false">SHOW</button>
                                {{-- <a href="{{ asset('uploads/' . $item->reciboimage) }}" class="btn btn-success btn-xs"
                                    download>DOWNLOAD</a> --}}
                            @endif



                        </td>

                    </tr>
                @endif
            @endforeach


        </tbody>

    </table>

    <hr>
    <h4>CASHINS RECEIVED</h4>

    <table id="" class="table table-striped table-bordered example" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>amount</th>
                <th>receiver</th>
                <th>reciboimage</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($getallci as $item)
                @if ($item->ispending == 1)
                    <tr>
                        <td>{{ $item->username }} - <small>{{ $item->link }}</small></td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->receiver }}</td>
                        <td>
                            <button data-id="{{ $item->ciId }}"
                                data-urlimg="{{ asset('uploads') }}/{{ $item->reciboimage }}"
                                class="btn btn-outline-warning btn-block thisimg" data-toggle="modal"
                                data-target=".modalrcp" data-backdrop="static" data-keyboard="false">SHOW</button>
                            {{-- <a href="{{ asset('uploads/' . $item->reciboimage) }}" class="btn btn-success btn-xs"
                                download>DOWNLOAD</a> --}}


                        </td>
                        <td>

                            Recieved

                            {{-- <form action="/rejected" method="POST">
                                @csrf
                                <input type="hidden" name="subId" value="{{ $item->ciId }}">
                                <button type="submit" class="btn btn-outline-danger btn-xs">MARK AS REJECT</button>
                            </form> --}}


                        </td>
                    </tr>
                @endif
            @endforeach


        </tbody>

    </table>


    <hr>
    <h4>CASHINS REJECTED</h4>

    <table id="" class="table table-striped table-bordered example" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>amount</th>
                <th>receiver</th>
                <th>reciboimage</th>

                <th>Action</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($getallci as $item)
                @if ($item->ispending == 2)
                    <tr>
                        <td>{{ $item->username }} - <small>{{ $item->link }}</small></td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->receiver }}</td>
                        <td>
                            @if ($item->reciboimage == null)
                                NO IMAGE RECEIPT
                            @else
                                <a href="{{ asset('uploads') }}/{{ $item->reciboimage }}" target="_blank">SHOW</a>
                                <a href="{{ asset('uploads/' . $item->reciboimage) }}" class="btn btn-success btn-xs"
                                    download>DOWNLOAD</a>
                            @endif



                        </td>
                        <td>

                            <button class="btn btn-danger btn-xs">REJECTED</button>

                            <form action="/recieved" method="POST">
                                @csrf
                                <input type="hidden" name="subId" value="{{ $item->ciId }}">
                                <button type="submit" class="btn btn-outline-secondary btn-xs">MARK AS RECEIVED</button>
                            </form>



                        </td>
                        <td> {{ $item->cremarks }}</td>
                    </tr>
                @endif
            @endforeach


        </tbody>

    </table>

    <script>
        $('.example').on('click', '.thisimg', function() {
            var imgs = $(this).attr('data-urlimg');
            var subId = $(this).attr('data-id');


            $('.igmgg').attr('src', imgs);
            $('.igmgg').attr('href', imgs);
            $('#subId').val(subId);
            $('#subIdreject').val(subId);
        });
    </script>
@endsection
