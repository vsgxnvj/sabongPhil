@extends('layouts.member')
@section('content')
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>amount</th>
                <th class="d-none d-md-table-cell">accountno</th>
                <th class="d-none d-md-table-cell">fullname</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($getallcorequest as $item)
                <tr>
                    <td>{{ $item->username }} <small>({{ $item->name }})</small></td>
                    <td>{{ number_format($item->amount, 2) }} php</td>
                    <td class="d-none d-md-table-cell">{{ $item->accountno }} - {{ $item->bankname }}</td>
                    <td class="d-none d-md-table-cell">{{ $item->fullname }}</td>
                    {{-- <td>PAID - <a href="">VIEW</a></td> --}}
                    <td>
                        @if ($item->status == 0)
                            PROCESSING...
                        @elseif($item->status == 2)
                            Unable to perform withdrawal: Insufficient balance.
                        @else
                            {{-- <a href="{{ asset('/uploads') }}/{{ $item->receipt }}">VIEW RECIEPT</a> --}}
                            <button class=" btn btn-success getimg " data-toggle="modal" data-receipt="{{ $item->receipt }}"
                                data-target="#recibona">VIEW RECIEPT</button>
                        @endif
                    </td>

                </tr>
            @endforeach



        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="recibona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Congratulations!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" id="reciboimges" style="width:100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <script>
        document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');


        document.querySelectorAll('.getimg').forEach(function(element) {
            element.addEventListener('click', function() {
                var receipt = this.getAttribute('data-receipt');

                document.getElementById('reciboimges').src = "{{ asset('uploads') }}" + "/" + receipt;
            });
        });
    </script>
@endsection
