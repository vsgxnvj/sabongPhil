@extends('layouts.member')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>



    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addmodal">
        <i class="fas fa-plus"></i> ADD MOP
    </button><br><br>



    <table id="example" class="table table-striped table-bordered example" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bankname</th>
                <th>Account#</th>
                <th>Actions</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($mop as $item)
                <tr>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->bankname }}</td>
                    <td>{{ $item->accountno }}</td>
                    <td>

                        @if ($item->isactive == 0)
                            <form action="/mop/enable/{{ $item->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-xs">ENABLE</button>
                            </form>
                        @else
                            ACTIVE MOP USED
                        @endif


                    </td>
                    <td>
                        <form action="mop/delete" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="deleteID">
                            <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                        </form>

                    </td>
                </tr>
            @endforeach





        </tbody>

    </table>



    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adding Mode of Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="/mop/store" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">E-WALLET</label>
                            <select class="form-control" name="bankname" id="">
                                <option value="GCASH" selected>GCASH</option>
                                <option value="PAYMAYA">PAYMAYA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Account name</label>
                            <input type="text" class="form-control" name="fullname" id=""
                                aria-describedby="helpId" placeholder="" value="{{ old('fullname') }}" autocomplete="off">
                            @if ($errors->has('fullname'))
                                <small id="helpId" class="form-text text-danger">{{ $errors->first('fullname') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Account No.</label>
                            <input type="number" class="form-control" name="accountno" placeholder="ex: 09350044621"
                                aria-describedby="helpId" value="{{ old('accountno') }}" autocomplete="off">
                            @if ($errors->has('accountno'))
                                <small id="helpId"
                                    class="form-text text-danger">{{ $errors->first('accountno') }}</small>
                            @endif
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
