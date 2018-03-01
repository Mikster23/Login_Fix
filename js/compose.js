$(document).ready(function(){
  $('#myBtn').click(function() {
    $('#mymodal').modal();
  });
  $(function() {
    $('#tag-form-submit').on('click', function(e) {
      e.preventDefault();

      $msg=$('#modmsg').val();
      $num=$('#modnum').val();
      alert($msg +" " + $num);
      $.ajax({
        type: "POST",
        url: "composemsg.php",
        data: {
          unum: $num,
          umsg: $msg,
       //     pnum : $phone
         //  alert($uid);
          mymodal: 1,
        },
        success: function(response) {
          console.log("ADDEEDDDDD");
        },
        error: function() {
          alert('Error');
        }
      });
      return false;
    });
  });
});
