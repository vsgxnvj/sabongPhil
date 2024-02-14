@extends('layouts.member')
@section('content')
    <h4>CASHIN TRANSACTIONS</h4>
    <table id="example" class="table table-striped table-bordered example" style="width:100%;font-size:14px">
        <thead>
            <tr>
                <th>Username</th>
                <th>Site</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cashin as $item)
                <tr>
                    <td>
                        {{ $item->username }}

                    </td>
                    <td>
                        @if ($item->ispending == 1)
                            <a href="{{ $item->link }}" class="btn btn-outline-success btn-xs btn-block" target="_blank">
                                SITE <i class="fa fa-external-link-alt"></i>
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ number_format($item->amount, 2) }} PHP




                    </td>
                    <td>
                        @if ($item->ispending == 0)
                            <button class="btn btn-outline-warning btn-block btn-xs">Processing..</button>
                        @elseif ($item->ispending == 1)
                            <button class="btn btn-outline-info btn-block btn-xs">Loaded</button>
                            <span class="badge badge-success"></span>
                        @elseif ($item->ispending == 2)
                            <button class="btn btn-outline-danger btn-block btn-xs">Rejected</button>
                        @endif

                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->dateci)->format('M d, Y - h:i A') }}</td>
                    {{-- <td>{{ $item->dateci }}</td> --}}

                </tr>
            @endforeach


        </tbody>

    </table>


    <script>
        document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');
    </script>
@endsection
