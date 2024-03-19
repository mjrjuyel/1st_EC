// data Table 
$(document).ready( function () {
    $('#myTable').DataTable({
        ordering: false,
    });
} );

// ++++++++======Soft Delete
// $(document).ready(function(){
//     $(document).on("click","#softdel",function(){
//         var deleteId = $(this).data('id');
//         $('.modal_id #modal_id').val(deleteId);
//     });
// })
$(document).ready(function(){
    $(document).on("click", "#softDel", function () {
           var deleteID = $(this).data('id');
           $(".modal_body #modal_id").val( deleteID );
      });
    // $(document).on("click", "#recover", function () {
    //        var restoreID = $(this).data('id');
    //        $(".modal_body #modal_id").val( restoreID );
    //   });
    // $(document).on("click", "#delete", function () {
    //        var deleteID = $(this).data('id');
    //        $(".modal_body #modal_id").val( deleteID );
    //   });
  });
