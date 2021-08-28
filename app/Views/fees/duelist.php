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
              <li class="breadcrumb-item active">Due List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
<div class="container">
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
                    <th>Course Fees</th>
                    <th>Submitted Fees</th>
                    <th>Due Fees</th>
                    <th>Last Submitted Fees Date</th>
                  </tr>
                  </thead>
              <tbody>
    <?php 
    $index=0;
   foreach($data as $info)
      {?>
          <tr>
           <td><?=++$index;?></td>
           <td><a href="<?=ROOT.'student/edit/'.uencode($info['student_id']);?>"><?=$info['sname'];?></a></td>
  <td><?=$info['courses_name'],"($info[cfees])";?></td>
  <td> <?=$info['cfees'];?></td>
  <td> <?=$info['submitted_fees'];?></td>
  <td> <b><?=$info['due_fees'];?></b></td>
  <td> <?=date('d-M-Y',strtotime($info['submitted_date']));?></td>
                  </tr>
                  <?php } ?>
               </tbody>
                  <tfoot>
                  <tr>
                    <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Courses Name</th>
                    <th>Courses Fees</th>
                    <th>Submitted Fees</th>
                    <th>Due Fees</th>
                    <th>Last Submitted Fees Date</th>
                     </tr>
                </tfoot>
          </table>
</div>
</div>
