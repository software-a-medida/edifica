"use strict";

$( document ).ready(function ()
{
    $('#user-register').ajaxSubmit({
        callback: function ()
        {
            console.log('ok');
        }
    });
});
