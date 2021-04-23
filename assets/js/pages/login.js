"use strict";

$( document ).ready(function ()
{
    $('#user-login').ajaxSubmit({
        callback: function ()
        {
            console.log('ok');
        }
    });
});
