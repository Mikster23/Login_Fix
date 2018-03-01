
$(document).ready(function(){
  $('#smessid').click(function() {

          $('#contactmod').modal();
      });

      $(function() {

$('#submitcontact').on('click', function(e) {
   e.preventDefault();
alert("HUHU");

    $num=$('#addnum').val();
    $name=$('#addname').val();

    $.ajax({


        type: "POST",
        url: "addcontact.php",
        data: {
          unum: $num,
          uname: $name,
     //     pnum : $phone
       //  alert($uid);
          contactmod: 1,

        },

      success: function(response) {
        console.log('success add contact');
        },
        error: function() {
            alert('Error');
        }
    });
    return false;
});
});


});
