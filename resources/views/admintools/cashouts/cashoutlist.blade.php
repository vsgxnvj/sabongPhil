@extends('layouts.member')
@section('content')
    <div class="card">
        <div class="card-header">CASHOUT REQUEST LIST</div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered example" style="width:100%; font-size: 12px">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Amount</th>
                        <th class="d-none d-md-table-cell">Bank Name</th>
                        <th class="d-none d-md-table-cell">Account No.</th>
                        <th class="d-none d-md-table-cell">Date</th>
                        <th>Action</th>
                        <th>Set Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getall as $item)
                        @if ($item->status == 0)
                            <tr>
                                <td>{{ $item->username }} <button class="btn btn-secondary btn-xs clickcopy"
                                        data-username="{{ $item->username }}">COPY CLIPBOARD</button>
                                </td>
                                <td>{{ $item->amount }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->bankname }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->accountno }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->created_at->format('M, d Y') }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <button class="btn btn-warning btn-sm process" data-toggle="modal"
                                            data-target="#processmodal" data-id="{{ $item->id }}">Process</button>
                                        <button class="btn btn-info btn-sm copyclipboard"
                                            data-username="{{ $item->username }}" data-amount="{{ $item->amount }}"
                                            data-bankname="{{ $item->bankname }}" data-accountno="{{ $item->accountno }}"
                                            data-fullname="{{ $item->fullname }}">COPY</button>
                                    @else
                                        PAID |
                                        <button class="btn btn-outline-secondary btn-xs process" data-toggle="modal"
                                            data-target="#processmodal" data-id="{{ $item->id }}">re-process</button>
                                    @endif
                                </td>
                                <td>

                                    <form action="co-reject" method="POST">

                                        @csrf

                                        <input type="hidden" name="coId" value="{{ $item->id }}">

                                        <button type="submit" class="btn btn-outline-danger">REJECT</button>

                                    </form>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>




    <div class="card">
        <div class="card-header">PAID REQUEST LIST</div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered example" style="width:100%; font-size: 12px">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Amount</th>
                        <th class="d-none d-md-table-cell">Bank Name</th>
                        <th class="d-none d-md-table-cell">Account No.</th>
                        <th class="d-none d-md-table-cell">Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getall as $item)
                        @if ($item->status == 1)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->amount }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->bankname }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->accountno }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->created_at->format('M, d Y') }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <button class="btn btn-warning btn-sm process" data-toggle="modal"
                                            data-target="#processmodal" data-id="{{ $item->id }}">Process</button>
                                        <button class="btn btn-info btn-sm copyclipboard"
                                            data-username="{{ $item->username }}" data-amount="{{ $item->amount }}"
                                            data-bankname="{{ $item->bankname }}" data-accountno="{{ $item->accountno }}"
                                            data-fullname="{{ $item->fullname }}">COPY</button>
                                    @else
                                        <button class="btn btn-outline-secondary btn-sm process" data-toggle="modal"
                                            data-target="#processmodal" data-id="{{ $item->id }}">re-process</button>

                                        <button class="btn btn-info btn-sm copyclipboard"
                                            data-username="{{ $item->username }}" data-amount="{{ $item->amount }}"
                                            data-bankname="{{ $item->bankname }}" data-accountno="{{ $item->accountno }}"
                                            data-fullname="{{ $item->fullname }}">COPY</button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>



    <div class="card">
        <div class="card-header">REJECT REQUEST LIST</div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered example" style="width:100%; font-size: 12px">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Amount</th>
                        <th class="d-none d-md-table-cell">Bank Name</th>
                        <th class="d-none d-md-table-cell">Account No.</th>
                        <th class="d-none d-md-table-cell">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($getall as $item)
                        @if ($item->status == 2)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->amount }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->bankname }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->accountno }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->created_at->format('M, d Y') }}</td>

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="processmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">For Process</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/co-process" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="hiddenID" class="hiddenID">

                        <div class="form-group">
                            <label for="">Upload Receipt</label>
                            <input type="file" class="form-control" name="recibo" aria-describedby="helpId"
                                required>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('clickcopy')) {
                var username = event.target.getAttribute('data-username');

                function copyToClipboard(text) {
                    const textarea = document.createElement('textarea');
                    textarea.value = text;
                    document.body.appendChild(textarea);
                    textarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textarea);
                }

                copyToClipboard(username);
                alert('Copied to clipboard: ' + username);
            }
        });
    </script>
@endsection
