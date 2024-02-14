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


  


<div class="container">
  <div class="row justify-content-center">
     <div class="col-md-12">
        <nav class="navbar navbar-expand ">
          
           <div class="collapse navbar-collapse" id="navbarsExample02">
              <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="btn btn-outline-warning" href="/home">HOME <span class="sr-only">(current)</span></a>
                 </li>
                 {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                 </li> --}}
              </ul>
         
           </div>
        </nav>

     


        <div class="card">
           <div class="card-header">CASHOUT REQUEST LIST</div>
           <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 12px">
              <thead>
                  <tr>
                      <th>Username</th>
                      <th>Amount</th>
                      <th class="d-none d-md-table-cell">Bank Name</th>
                      <th class="d-none d-md-table-cell">Account No.</th>
                      <th class="d-none d-md-table-cell">Date</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($getall as $item)
                  <tr>
                      <td>{{$item->username}}</td>
                      <td>{{$item->amount}}</td>
                      <td class="d-none d-md-table-cell">{{$item->bankname}}</td>
                      <td class="d-none d-md-table-cell">{{$item->accountno}}</td>
                      <td class="d-none d-md-table-cell">{{$item->created_at->format('M, d Y') }}</td>
                      <td>
                          @if($item->status == 0)
                          <button class="btn btn-warning btn-sm process" data-toggle="modal" data-target="#processmodal"
                              data-id="{{$item->id}}">Process</button>
                          <button class="btn btn-info btn-sm copyclipboard" data-username="{{$item->username}}"
                              data-amount="{{$item->amount}}" data-bankname="{{$item->bankname}}"
                              data-accountno="{{$item->accountno}}" data-fullname="{{$item->fullname}}">COPY</button>
                          @else
                          PAID
                          @endif
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
   
    
      
<div>



<!-- Modal -->
<div class="modal fade" id="processmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">For Process</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/co-process" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="hiddenID" class="hiddenID">

        <div class="form-group">
          <label for="">Upload Receipt</label>
          <input type="file" class="form-control" name="recibo" aria-describedby="helpId" placeholder="">
        </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $('.process').on('click', function(){
    var idd = $(this).attr('data-id');
    $('.hiddenID').val(idd)
 
  });

  $('.copyclipboard').on('click', function(){
    var username = $(this).attr('data-username');
    var amount = $(this).attr('data-amount');
    var bankname = $(this).attr('data-bankname');
    var accountno = $(this).attr('data-accountno');
    var fullname = $(this).attr('data-fullname');

    // alert(username)
    // alert(amount)
    // alert(bankname)
    // alert(accountno)
    // alert(fullname)

    output = "USERNAME: "+username+"\nAMOUNT: "+ amount +"\n"+ bankname +": "+ accountno +"\nNAME: "+fullname+"\n"


    copyToClipboard(output);
      Swal.fire({
      title: "COPIED",
      text: "You copy the information\n"+output,
      icon: "success"
      });
  
 
  });

  function copyToClipboard(text) {
  var tempInput = document.createElement("textarea");
  tempInput.value = text;
  document.body.appendChild(tempInput);
  tempInput.select();
  document.execCommand("copy");
  document.body.removeChild(tempInput);
  console.log("Text copied to clipboard: " + text);
}


  


  


</script>

</body>
</html>