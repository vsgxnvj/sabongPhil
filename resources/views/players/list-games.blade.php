@extends('layouts.member')

@section('content')
    <style>
        @media screen and (max-width: 567px) {
            .card-text {
                margin-bottom: 0.5em;
            }
        }

        .card {
            margin: 5%;
            flex-direction: row;
        }

        .card-body {
            padding: 0.5em 1em;
        }

        .card1.card img {
            max-width: 12em;

            height: 100%;
            border-bottom-left-radius: calc(0.25rem - 1px);
            border-top-left-radius: calc(0.25rem - 1px);
        }
    </style>



    <h1>LIST OF GAMES</h1>




    <div class="row">
        @foreach ($listgames as $item)
            <div class="col-sm-6">
                <div class="card1 card align-items-center" style="max-width: 540px;">
                    <img src="{{ asset('/uploads') }}/{{ $item->image }}" alt="..." style="height: 10em">
                    <div class="card-body">
                        <p style="font-size: 2em"><strong>{{ $item->name }}</strong></p>

                        <a href="/list-games-register/{{ $item->id }}"
                            class="btn btn-success btn-sm btn-block">REGISTER</a>


                    </div>
                </div>
            </div>
        @endforeach
    </div>







    <script>
        document.body.classList.add('sidebar-mini', 'layout-fixed', 'dark-mode');
    </script>
@endsection
