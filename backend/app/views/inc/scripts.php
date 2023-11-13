<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=URLROOT?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=URLROOT?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=URLROOT?>/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?=URLROOT?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=URLROOT?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=URLROOT?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=URLROOT?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- ckeditor -->
<script src="<?=URLROOT?>/plugins/ckeditor/ckeditor.js"></script>

<!-- Select 2 -->
<script src="<?=URLROOT?>/plugins/select2/js/select2.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,  
      "autoWidth": true,
      "pageLength": <?=RESULT_LENGTH?>,
      "processing": true,
    });
  });
</script>

<script>
  ClassicEditor.create( document.querySelector('#editor'), {
    mediaEmbed: {
      previewsInData:true
    },
  })
    .then( editor => {
      console.log( editor);
    } )
      .catch( error => {
        console.error( error );
    } );
</script>

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.select2').select2();
  });

  // show file name in input
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>

