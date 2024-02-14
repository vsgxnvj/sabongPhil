@extends('layouts.member')
@section('content')


<table id="example" class="table table-striped table-bordered" style="width:100%">
   <thead>
       <tr>
           <th>Name</th>
           <th>Action</th>
           <th>Action</th>
         
       </tr>
   </thead>
   <tbody>

      @foreach ($siteslist as $item)

      <tr>
         <td>{{$item->name}}</td>
         <td>
          <a href="/edit-site/{{$item->id}}" class="btn btn-warning" >EDIT</a>
           
         </td>
         <td> 
            <form method="POST" action="/destroy/{{$item->id}}">
                @csrf
               
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </td>
     
     </tr>
          
      @endforeach

     
      
       
      
   </tbody>
  
</table>

@endsection