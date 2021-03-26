

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

