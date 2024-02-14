@extends('layouts.member')
@section('content')



<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-10">
          <nav class="navbar navbar-expand ">
            
             <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                      <a class="btn btn-outline-warning" href="/cashout-create">POST CASHOUT <span class="sr-only">(current)</span></a>
                   </li>
                   {{-- <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                   </li> --}}
                </ul>
           
             </div>
          </nav>
          <div class="card">
             <div class="card-header">LIST OF PLAYER / AGENT</div>
             <div class="card-body">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Cashout</th>
                            <th>Date</th>
                            <th>Action</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getall as $item)

                        <tr>
                            <td>{{$item->username}}</td>
                            <td>{{$item->role}}</td>
                            <td>{{$item->cashout}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                              <form method="POST" action="cashout-delete/{{$item->id}}">
                                 @csrf
                                 @method('DELETE')
                                 <button  class="btn btn-danger" type="submit">Delete</button>
                             </form>
                            </td>
                          
                        </tr>
                            
                        @endforeach
                        
                      
                     
                      
                    </tbody>
                 
                </table>

               
             </div>
          </div>
       </div>
    </div>
 </div>
     
      
        


@endsection