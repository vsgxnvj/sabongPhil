  <!-- Small boxes (Stat box) -->
  <div class="row">
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
              <div class="inner">
                  <h3>{{ $countSubscription }}</h3>

                  <p>For Activation</p>
              </div>
              <div class="icon">

                  <i class="ion ion-person-add"></i>
              </div>
              <a href="/activate" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
              <div class="inner">
                  <h3>{{ $countCashin }}</h3>

                  <p>Cashin</p>
              </div>
              <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="/ci-list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
              <div class="inner">
                  <h3>{{ $countCashout }}</h3>

                  <p>Cashout</p>
              </div>
              <div class="icon">
                  <i class="ion ion-cash"></i>
              </div>
              <a href="/co-list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
              <div class="inner">
                  <h3>{{ $user }}</h3>

                  <p>Total Register</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
  </div>
  {{-- 
  <script src="https://minnit.chat/js/embed.js" defer></script><minnit-chat
      data-chatname="https://organizations.minnit.chat/889658193537135/Main?embed&nickname="
      data-style="width:100%;height:500px;max-height:90vh;"></minnit-chat>
  <p class="powered-by-minnit"><a href="https://minnit.chat" target=_blank>Embed a chatroom on your website for free
          with Minnit Chat</a></p> --}}
