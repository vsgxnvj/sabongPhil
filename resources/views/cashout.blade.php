<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SABONG PHIL | CASHOUTS</title>
</head>
<body>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">





<style>
  body {
    background-color: transparent !important;
  }





</style>




<script>
  function handleResponse(response) {
      if (response.success) {
          var successMsg = document.getElementById('success-message');
          var dataInfo = document.getElementById('data-info');

          successMsg.innerText = response.success;
          dataInfo.innerText = JSON.stringify(response.data);
      } else if (response.error) {
          alert('Error: ' + response.error);
      }
  }
</script>






<div class="container">
  <div class="row justify-content-center">
     <div class="col-md-5">
        <nav class="navbar navbar-expand ">
          
           <div class="collapse navbar-collapse" id="navbarsExample02">
              <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="btn btn-outline-warning" href="/">HOME <span class="sr-only">(current)</span></a>
                 </li>
                 {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                 </li> --}}
              </ul>
         
           </div>
        </nav>

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif


        <div class="card">
           <div class="card-header">CASHOUT REQUEST</div>
           <div class="card-body">

            <form action="/co-request" method="POST">
              @csrf

              <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" >
              </div>

              <div class="row">
                <div class="col-lg-6">   <div class="form-group">
                  <label for="">Amount</label>
                  <input type="number" class="form-control" name="amount" >
                </div></div>
                <div class="col-lg-6">   <div class="form-group">
                  <label for="">E-WALLET</label>
                  <select class="form-control" name="bankname" id="">
                    <option value="GCASH" selected>GCASH</option>
                    <option value="PAYMAYA">PAYMAYA</option>
                  </select>
                </div></div>
              </div>

           

           


              <div class="form-group">
                <label for="">Account No.</label>
                <input type="number" class="form-control" name="accountno" >
              </div>

              <div class="form-group">
                <label for="">Fullname</label>
                <input type="text" class="form-control" name="fullname" >
              </div>


              <button type="submit" class="btn btn-secondary btn-lg btn-block">SUBMIT</button>


            </form>

         

             
           </div>
        </div>
     </div>
  </div>
</div>
   
    
      
<div>










<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>