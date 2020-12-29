<div class="card-header" style=" background-color: #243643;">
  <div class ="row">
    
  </div>

  <div class ="row">
    <div style="color: #E6E7E7;" class="col-2">
      <h6>{{date('l')}}, {{date('F d, Y')}}</h6>
    </div>
    <div class ="col-8">
      <a href = "/categories/list" style="color:#C2D1DC; text-align:center;"><h1><strong>AUXFIN <img src="https://cdn3.iconfinder.com/data/icons/ballicons-reloaded-free/512/icon-70-512.png" height="56" width="57" alt=""> PORTAL</strong></h1></a>
    </div>
    @auth
    <div class ="col-2">
      <div align="right" >
        <a href="/bookmark/index"><button type="link" class="btn btn-secondary">Bookmarks</button></a>
      </div>
    </div>
    @endauth
  </div>
</div>