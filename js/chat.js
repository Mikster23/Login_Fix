"use strict";

$(document).ready(function () {
    var chatInterval = 250; //refresh interval in ms
    //var $userName = "Juan"/*$("#userName")*/;
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");
  var  $txtmsg = $chatInput.val();



/*
  $(document).on('click', '#updatechat tr', function() {

    var tableData = $(this).children("td").map(function() {
     return $(this).text().trim();
 }).get();
var   $uid=$(this).text();

  // alert($uid);
  // $phone=$('#ufirstname'+$uid).val();
  //console.log($uid);
console.log("orange "+$uid);




     //
  });
*/



    function sendMessage() {
        //var userNameString = $userName.val();
        var chatInputString = $chatInput.val();
        $txtmsg = $chatInput.val();
        console.log('chatval' + $txtmsg);


    //  sendSms();

        $.get("./write.php", {


            //username: userNameString,
            text: chatInputString,    success: function(response){
                $chatInput.val("");
        /*      $.get("./showusermsg.php", function (data) {

                 $chatOutput.html(data); //Paste content into chat output
             });*/
                }


        });



      //  $userName.val("");
        retrieveMessages();
    }
    $chatSend.click(function() {

        sendMessage();

    });

    function retrieveMessages() {
    $.get("./showusermsg.php", function (data) {
            $chatOutput.html(data); //Paste content into chat output
        });


    }
    function sendSms(){

      $.ajax({
        type: "POST",
        url: "send.php",
        data: {
            num : $uid,
            txt : $txtmsg,
    //      id: $uid,
     //     pnum : $phone
       //  alert($uid);
          edit: 1,

        },

        success: function(response){

          $chatInput.val("");

/*      $.get("./showusermsg.php", function (data) {

         $chatOutput.html(data); //Paste content into chat output
     });*/
   }
 });
 };


 });


/*
    setInterval(function () {
        retrieveMessages();
    }, chatInterval);*/
