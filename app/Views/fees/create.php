<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Fees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Fees</a></li>
              <li class="breadcrumb-item active">Create</li>
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
              <h3 class="card-title">Student Fees Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form role="form" method="POST" action="<?= ROOT.'fees/store';?>" id="quickForm" enctype="multipart/form-data">
   <div class="card-body"> 

          <div class="form-group">
          <label for="sname">Student Name</label>
          <input type="text" class="form-control"
           id="sname" readonly value="<?=$sdata['sname']??$sdata[0]['sname'];?>">
          </div>

          <div class="form-group">
          <div class="form-group">
          <label for="sname">Course Name</label>
          <input type="text" class="form-control" id="sname" readonly
          value="<?=$sdata['courses_name']??$sdata[0]['courses_name']," (",$cfees=$sdata['cfees']??$sdata[0]['cfees'],")";?>">
          </div>

      <?php 
          $total=0;
          if(isset($sdata['submitted_fees'])&&$sdata['submitted_fees'])
          { 
            $total=$sdata['submitted_fees'];
            ?>
            <div class="form-group">
            <label for="sname">1st Installment</label>
            <input type="text" class="form-control" id="sname" readonly
            value="<?=$sdata['submitted_fees']," (",$sdata['submitted_date'],")";?>">
            </div>
      <?php }
            else{
            if(isset($sdata[0]['submitted_fees'])&&$sdata[0]['submitted_fees'])
            {
              $index=1;
              $total=0;
              foreach($sdata as $sinfo)
              { 
                  $total+=$sinfo['submitted_fees'];
                ?>
            <div class="form-group">
            <label for="sname"><?=$index++?>'s Installment</label>
            <input type="text" class="form-control" id="sname" readonly
            value="<?=$sinfo['submitted_fees']," (",date('d-M-Y',strtotime($sinfo['submitted_date'])),")";?>">
            </div>

            <?php
              } ?>
            <div class="form-group">
            <label for="sname">Total Fees Paid</label>
            <input type="text" class="form-control" id="sname" readonly value="<?=$total;?>">
            </div>
            <?php
            }
    }
            $duefees=$cfees-$total;
    ?>
          <div class="form-group">
          <label for="fees">Due Fees</label>
          <input type="hidden" name="student_id" value="<?=$sdata['sstudent_id']??$sdata[0]['sstudent_id'];?>">
          <input type="number" name="fees" class="form-control" id="fees" value="<?=$duefees;?>">
          </div>

          <div class="form-group">
          <label for="date">Date</label>
          <input type="date" name="date" class="form-control" id="date" max="<?=date('Y-m-d');?>" value="<?=date('Y-m-d');?>">
          </div>
                    
      <div class ="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>
</div>



