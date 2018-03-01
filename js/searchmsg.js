var $chatOutput = $("#chatOutput");
$(document).ready(function() {
var $chatOutput = $("#chatOutput");
  $(document).on('click', '#tblGrid tr', function() {
  //  var tableData =
    /* $(this).children("td:first").map(function() {
      return $(this).text().trim();
    }).get(); */
    $uid= $(this).find('td').text();

    //$(this).text();

    // alert($uid);
    // $phone=$('#ufirstname'+$uid).val();
    console.log($uid);



    showSrec();
    updateSmsg();


  });
});

function showSrec(){
  console.log("Catch my breath"+$uid);
  $.ajax({
    url: 'searchReceiver.php',
    type: 'POST',
    data:{
      id: $uid,
      rr: 1,
    },
    success: function(response){
      $('#divReceiver').html(response);
    }
  });
  /*setInterval(function(){
     $('#divReceiver').load('searchReceiver.php');
  }, 1000)*/
}

function updateSmsg(){
       $.ajax({
         type: "POST",
         url: "searchusermsg.php",
         data: {
           id: $uid,
      //     pnum : $phone
        //  alert($uid);
           ur: 1,
         },
         success: function(response){
           $chatOutput.html(response);

/*      $.get("./showusermsg.php", function (data) {

          $chatOutput.html(data); //Paste content into chat output
      });*/
         },
/*    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(updateSmsg, 1000);
    }*/
       });
       //
  }
