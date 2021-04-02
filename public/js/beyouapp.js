

//This function will highlight the active menu and also keep a treemenu open 
$(function () {
  var url = window.location;
  // for single sidebar menu
  $('ul.nav-sidebar a').filter(function () {
      return this.href == url;
  }).addClass('active');

  
  // for sidebar menu and treeview
  $('ul.nav-treeview a').filter(function () {
      return this.href == url;
  }).parentsUntil(".nav-sidebar > .nav-treeview")
      .css({'display': 'block'})
      .addClass('menu-open').prev('a')
      .addClass('active');   

});

$('#input_mbrfcr').on('change',function(){
    //get the file name
    var fileName = $(this).val().replace('C:\\fakepath\\', " ");
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})

$(document).ready(function() {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $("#example1").DataTable({
        //scrollX : true,
        fixedHeader: true,
        "iDisplayLength": 25
    });
});
