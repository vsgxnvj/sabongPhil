@extends('layouts.member')

@section('content')


<h3>DEACTIVATED ACCOUNTS</h3>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Site</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $number = 1; ?>
    @foreach ($subcript as $item)
        
  
    <tr>
      <th scope="row">{{$number++}}</th>
      <td>{{$item->username}}</td>
      <td>{{$item->name}}</td>
      <td>

        <form action="/deactivated/{{$item->id}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-warning">ACTIVATE AGAIN</button>
        </form>
      </td>
    </tr>

      @endforeach
  
  </tbody>
</table>




@endsection