$(document).ready(function()
{
    console.log("jest w pyte");
    $("#hideLogin").click(function()
    {
        $("#loginForm").hide();
        $("#registerForm").show();
    });

    $("#hideRegister").click(function()
    {
        $("#loginForm").show();
        $("#registerForm").hide();
    });
    
    
});