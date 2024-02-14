@extends('layouts.member')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <nav class="navbar navbar-expand ">
           
            <div class="collapse navbar-collapse" id="navbarsExample02">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="btn btn-outline-warning" href="/list-sites">LIST OF SITES <span class="sr-only">(current)</span></a>
                  </li>
                  {{-- <li class="nav-item">
                     <a class="nav-link" href="#">Link</a>
                  </li> --}}
               </ul>
          
            </div> 
         </nav>
         <div class="card">
            <div class="card-header">ADD LEGIT SITES</div>
            <div class="card-body">
               <form action="/create-sites" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>NAME OF SITE</label>
                           <input type="text" class="form-control @error('namesite') is-invalid @enderror"  name="namesite" value="{{ old('namesite') }}"  autocomplete="name" autofocus> 
                           @error('namesite')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>REGISTRATION LINK</label>
                           <input type="text" class="form-control @error('linksite') is-invalid @enderror"  name="linksite" value="{{ old('linksite') }}"  autocomplete="linksite" autofocus> 
                           @error('linksite')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>SITE DESCRIPTION</label>
                     <textarea cols="30" rows="5" type="text" class="form-control summernote @error('descriptionsite') is-invalid @enderror"  name="descriptionsite" value="{{ old('descriptionsite') }}"  autocomplete="descriptionsite" autofocus></textarea> 
                     @error('descriptionsite')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>REMARKS</label>
                     <textarea name="remarksite" class="form-control" cols="30" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                     <label>Images Logo</label>
                     <input type="file" class="form-control @error('fileimage') is-invalid @enderror"  name="fileimage" value="{{ old('fileimage') }}"  autocomplete="fileimage" autofocus> 
                     @error('fileimage')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <button type="submit" class="btn btn-warning">SUBMIT</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection