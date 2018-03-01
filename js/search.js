$(document).ready(function(){
  $('#srchMes').keypress(function(e) {
    var srchMe = document.getElementById("srchMes").value;
    console.log("Bitbit"+srchMe);
    //$('#modsearch').modal();
    showSRCH();
  });

});

function showSRCH(){
  $.ajax({
    url: 'showSearch.php',
    type: 'POST',
    async: false,
    data:{
    //  pnum : $phone,
      show: 1
    },
    success: function(response){
      $('#divAll').html(response);
     //setTimeout(showSRCH,4000);
    }

  });
}
  /*
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

        },
        error: function() {
          alert('Error');
        }
      });
      return false;
    });
  });
});
*/
