<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Login Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Login</a></li>
              <li class="breadcrumb-item active">Login</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
<div class="container">
<div class="card-body">
<div class="card card-primary">
        <?php if(Session::get('emsg')){
          ?>
          <div class="alert alert-danger">
          <?= Session::get('emsg');?>
          </div>
          <?php
          Session::delete('emsg');
        }?>
              <div class="card-header">
                <h3 class="card-title">Enter your Login Details</h3>
              </div>
              <!-- /.card-header  -->
              <!-- form start -->
<form role="form" method="POST" action="<?= ROOT.'login/login';?>" id="quickForm" enctype="multipart/form-data">
    <div class="card-body">

          <div class="form-group">
          <label for="username">User Name</label>
          <input type="text" name="username" class="form-control" id="username"
           placeholder="Enter user name" pattern=[A-z]{3,50}  title="Not in Alpabetical Format!" autocomplete="off" required>
          </div>

          <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password"
           placeholder="Type your Password" required>
          </div>
    </div>
      
                    
      <div class ="card-footer">
      <button type="submit" class="btn btn-primary">Login</button>
      </div>
</form>
</div>
</div>
</div>