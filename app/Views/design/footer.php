
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=PLUGINS;?>jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=PLUGINS;?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=PLUGINS;?>datatables/jquery.dataTables.min.js"></script>
<script src="<?=PLUGINS;?>datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=PLUGINS;?>datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=PLUGINS;?>datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=DIST;?>js/adminlte.min.js"></script>

<script src="<?=DIST;?>js/demo.js"></script>
<script src="<?=PLUGINS;?>summernote/summernote-bs4.min.js"></script>
<script src="<?=JS?>custom.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('.textarea').summernote()

  });
</script>
</body>
</html>


         