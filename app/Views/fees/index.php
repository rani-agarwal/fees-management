<!-- <h1>Index of view</h1> -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fees Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Fees</a></li>
              <li class="breadcrumb-item active">Index</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
<div class="container">
<div class="card-body">
  <form role="form" method="GET" action="<?= ROOT.'fees/index';?>" id="quickForm">
          
          <label for="from">From</label>
          <input type="date" class="form-control" name="from"
           id="from" value="<?=request('from')??date('Y-m-d',time()-(3600*24*30));?>">
           <br>
          <label for="to">To</label>
          <input type="date" class="form-control" name="to"
           id="to" value="<?=request('to')??date('Y-m-d',time());?>">
          <br>
          <button>Search</button>
          
</div>
<div class="card-body">
        <?php if(Session::get('smsg')){
          ?>
          <div class="alert alert-success">
          <?= Session::get('smsg');?>
          </div>
          <?php
          Session::delete('smsg');
        }?>
         <?php if(Session::get('emsg')){
          ?>
          <div class="alert alert-danger">
          <?= Session::get('emsg');?>
          </div>
          <?php
          Session::delete('emsg');
        }?>
        <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Courses Name</th>
                    <th>Submitted Fees</th>
                    <th>Submitted Date</th>
                  </tr>
                  </thead>
              <tbody>
                  <?php 
                  $index=0;
                  foreach($data as $info)
                  {?>
                  <tr>
                    <td><?=++$index;?></td>
                    
                    <td><?=$info['courses_name'],"($info[cfees])";?></td>
                    <td> <?=$info['submitted_fees'];?></td>
                    <td> <?=date('d-M-Y',strtotime($info['submitted_date']));?></td>
                  </tr>
                  <?php } ?>
               </tbody>
                  <tfoot>
                  <tr>
                  <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Courses Name</th>
                    <th>Fees</th>
                    <th>Submitted Date</th>
                     </tr>
                </tfoot>
          </table>
</div>
</div>
