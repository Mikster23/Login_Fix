var updateTimer, updateInterval;
var searchTimer, searchInterval;

var searchtime, updatetime , rectime, srectime;
var $chatOutput = $("#chatOutput");
var check;
var $flag = 0 ;
$(document).ready(function() {
  var $chatOutput = $("#chatOutput");
  $(document).on('click', '#updatechat tr', function() {
check = true;
//clrhightime();
  //var updatemsg = function(){
function updatemsg(){
  check = true;

  // *********************************
  // GET THE ID OF SETTIMEOUT THAT HAVE THE HIGHEST PENDING REQUEST

    clrhightime();
//*************************************************************
      $.ajax({
               type: "POST",
               url: "showusermsg.php",
               data: {
                 id: $uid,
                 async: false,
            //     pnum : $phone
              //  alert($uid);
                 edit: 1,

               },

               success: function(response){

                   console.log("@update message");
                // clearTimeout(searchTimer);
                // clearInterval(searchInterval);
                 $chatOutput.html(response);

              //       $chatOutput.remove();
      /*      $.get("./showusermsg.php", function (data) {

                $chatOutput.html(data); //Paste content into chat output
            });*/
               }


             });
          if(check == true)

          {

              updateTimer = setTimeout(updatemsg,3000);

            //  console.log("UPDATE TIMER LENGTH " + updateTimer.length);

            /*  for (var i = 0; i < updateTimer.length; i++) {
    clearTimeout(timeouts[i]);
}*/
              console.log(check + " check at update message");
            //  clrhightime();
          }

            if(updateTimer &&check ==false){
         clearTimeout(updateTimer);
        // $chatOutput.clearQueue();
console.log("updatetimer Cleared");
}
}

             //




    //  clearInterval(updateInterval);



    var tableData = $(this).children("td").map(function() {
      return $(this).text().trim();
    }).get();
    $uid=$(this).text();
    // alert($uid);
    // $phone=$('#ufirstname'+$uid).val();
    console.log($uid);
    //clearTimeout(searchTimer);
  //  check == true;
  /*
    var notHover = function() {
       var timerId = setTimeout(function () {
          $('#proFBfeel').hide();
          $('#proFBfeel .moreinfos').html('');
          $('.contact_pro').html('');
        }, 3000);

        // return a function which will cancel the timer
        return function () { clearTimeout(timerId); };
    };*/

if(check == true){
  updatemsg();
    showrec();}
  //  updatemsg();
  });

  var $chatOutput = $("#chatOutput");
  $(document).on('click', '#tblGrid tr', function() {

check = false;
    function updateSmsg(){
      clrhightime();
    // clearTimeout(searchTimer);W
       //clrhightime();
      //     clearInterval(updateInterval);
        //   stopmsg();
      // clearTimeout(updateTimer);
           $.ajax({
             type: "POST",
             url: "searchusermsg.php",
             data: {
               id: $sid,
               async: false,
          //     pnum : $phone
            //  alert($uid);
               ur: 1,
             },
             success: function(response){
               //console.log(updateTimer+"Okay na");
                 console.log("@search message");


               $chatOutput.html(response);

    /*      $.get("./showusermsg.php", function (data) {

              $chatOutput.html(data); //Paste content into chat output
          });*/
             }

          // Schedule the next request when the current one's complete


           });
        if ( check == false){     searchTimer = setTimeout(updateSmsg, 3000); }
   console.log(check + " check at searchmessage");
          /*   if(searchTimer){
               clearTimeout(searchTimer);

               console.log("search timer CLEARED");
             }*/
           //
      }

  //  var tableData =
    /* $(this).children("td:first").map(function() {
      return $(this).text().trim();
    }).get(); */

    $sid= $(this).find('td').text();
    //$(this).text();
    // alert($uid);
    // $phone=$('#ufirstname'+$uid).val();
    console.log($sid);

   showSrec();
    updateSmsg();
  });
});

function clrhightime(){

  var highestTimeoutId = setTimeout(";");
  for (var i = 0 ; i < highestTimeoutId ; i++) {
  clearTimeout(i);
  }
}
function showrec(){
//  clrhightime();
  $.ajax({
    url: 'showreceiver.php',
    type: 'POST',
    data:{
      show: 1
    },
    success: function(response){
      console.log("@update receiver");
    //  clearTimeout(searchTimer);
    //  clearInterval(searchInterval);
      $('#divReceiver').html(response);
    }
  });
  var highestTimeoutId = setTimeout(";");
  //clrhightime();
rectime = setTimeout(showrec, 2000);
$flag = 1;
if($flag == 1){

  clearTimeout(rectime);
}

}


/*
function retrieveMessages() {

}
$(document).on('click', '.updateuser', function(){
  $uid=$(this).val();

  $('#edit'+$uid).modal('hide');
  $('body').removeClass('modal-open');
  $('.modal-backdrop').remove();
  $ufirstname=$('#ufirstname'+$uid).val();
  $ulastname=$('#ulastname'+$uid).val();
  $umiddlename=$('#umiddlename'+$uid).val();
  $uemail=$('#uemail'+$uid).val();
  $udepartment=$('#udepartment'+$uid).val();
  $uusername=$('#uusername'+$uid).val();
  $upassword=$('#upassword'+$uid).val();
});*/



function showSrec(){
  //console.log("Catch my breath"+$sid);
    //clrhightime();
  $.ajax({
    url: 'searchReceiver.php',
    type: 'POST',
    data:{
      id: $sid,
      rr: 1,
    },
    success: function(response){
      console.log("@search Receiver");
      clearInterval(updateInterval);
      clearTimeout(updateTimer);
      $('#divReceiver').html(response);
    }
  });
  srectime = setTimeout(showSrec, 2000);
  $flag = 1;
  if($flag == 1){

    clearTimeout(srectime);
  }
}

function stopsmsg(){

 clearTimeout(searchTimer);
};
function stopmsg(){

clearTimeout(updateTimer);

}
