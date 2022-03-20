
$(document).ready(function(){
    $("#submitbtn").click(function(){
        
      var conf = $("#recipient-name").val();
      var name = $("#name").val();
      var email = $("#email").val();

        var data ="conf=" + conf + "&name=" + name + "&email=" + email;

        $.ajax({
          method: "post",
          url: "http://localhost/Gold/php/register.php?",
          data: data,
          success: function(data){

            $("#register_output").html(data);

            

          }

        });

    });

});