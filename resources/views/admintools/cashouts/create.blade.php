@extends('layouts.member')
@section('content')



<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
          <nav class="navbar navbar-expand ">
            
             <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                      <a class="btn btn-outline-warning" href="/cashout-index">LIST OF CASHOUT <span class="sr-only">(current)</span></a>
                   </li>
                   {{-- <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                   </li> --}}
                </ul>
           
             </div>
          </nav>
          <div class="card">
             <div class="card-header">ADD CASHOUT PLAYER/AGENT</div>
             <div class="card-body">

                <form action="/cashout-create" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus  required>
                </div>

                @error('username')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                  <label for="">Amount</label>
                  <input type="number" class="form-control @error('cashout') is-invalid @enderror" name="cashout" value="{{ old('cashout') }}"  autocomplete="cashout" autofocus  required>
                </div>

                @error('cashout')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
             
    
                <div class="form-group">
                    <label for="">Proof image</label>
                    <input type="file" class="form-control @error('cashoutimage') is-invalid @enderror"  name="cashoutimage" value="{{ old('cashoutimage') }}"  autocomplete="cashoutimage" autofocus  required> 
                  
                    @error('cashoutimage')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                 </div>


                 <div class="form-group">
                    <label for="">Sitename</label>
                    <input type="text" class="form-control @error('sitename') is-invalid @enderror" name="sitename" value="{{ old('sitename') }}"  autocomplete="sitename" autofocus required>
                  </div>

                  @error('sitename')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  
                  <button type="submit" class="btn btn-warning">SUBMIT</button>


                </form>
             </div>
          </div>
       </div>
    </div>
 </div>
     
      
        
<div>

@endsection