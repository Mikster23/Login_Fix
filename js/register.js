
"use strict";
function openLogin() {
  $.get("./login.php", {
      //username: userNameString,
      text: chatInputString
  });
}
/*
$(document).ready(function () {
    //var chatInterval = 250; //refresh interval in ms
    //var $userName = "Juan"/*$("#userName")*/;
/*    var $fnameSign = $("#fnameSign");
    var $mnameSign = $("#mnameSign");
    var $lnameSign = $("#lnameSign");
    var $depart = $("#depart");
    var $emailSign = $("#emailSign");
    var $userSign = $("#userSign");
    var $passSign = $("#passSign");
    var $confSign = $("#confSign");

    function register() {
        //var userNameString = $userName.val();
        var a = $fnameSign.val();
        var b = $mnameSign.val();
        var c = $lnameSign.val();
        var d = $depart.val();
        var e = $emailSign.val();
        var f = $userSign.val();
        var g = $passSign.val();
        var h = $confSign.val();

        $.get("./register.php", {
            //username: userNameString,
            _fname: a
            _mname: b
            _lname: c
            _dept: d
            _email: e
            _user: f
            _pass: g
            _conf: h
        });

        $userName.val("");
        retrieveMessages();
    }

    function retrieveMessages() {
        $.get("./read.php", function (data) {
            $chatOutput.html(data); //Paste content into chat output
        });
    }


    $_btn_signup.click(function () {
        register();

    });
/*
    setInterval(function () {
        retrieveMessages();
    }, chatInterval);*/
//});
