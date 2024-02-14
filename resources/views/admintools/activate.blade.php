@extends('layouts.member')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <table class="table example">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Site</th>
                            <th>Action</th>
                            <th>Script</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($isactivate as $item)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="/activate/{{ $item->subid }}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-warning">ACTIVATE</button>

                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-info scripttosite" data-link="{{ $item->link }}"
                                        data-cpassword="{{ $item->password }}" data-password="{{ $item->password }}"
                                        data-username="{{ $item->username }}">COPY
                                        SCRIPT</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>


    <script>
        $('.example').on('click', '.scripttosite', function() {
            var username = $(this).attr('data-username')
            var password = $(this).attr('data-password')
            var cpassword = $(this).attr('data-cpassword')

            var currentDate = new Date();
            var milliseconds = currentDate.getTime();

            var linksite = $(this).attr('data-link')


            var output = "document.querySelector('input[name=\"UserLogin.Username\"]').value ='" + username + "' " +
                "\ndocument.querySelector('input[name=\"NewPassword\"]').value = '" + password + "' " +
                "\ndocument.querySelector('input[name=\"ComparePassword\"]').value = '" + cpassword + "' " +
                "\ndocument.querySelector('input[name=\"UserProfile.Email\"]').value = " + milliseconds + " " +
                "\ndocument.querySelector('input[type=\"submit\"]').click(); ";

            var textarea = document.createElement("textarea");
            textarea.value = output;
            document.body.appendChild(textarea);

            textarea.select();
            document.execCommand("copy");

            document.body.removeChild(textarea);

            alert("Output value copied to the clipboard");

            window.open('https://sworldcup6.com/Account/Register?rid=REF1067314', '_blank', 'noopener,noreferrer');



        });
    </script>
@endsection
