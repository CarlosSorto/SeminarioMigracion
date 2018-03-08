<script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_iM2t2CIyihiXd7losXBxM");
   })();
</script>


<?php 
  require_once "recaptchalibGoogle.php";
  $secret = "6LeDbEkUAAAAAILJeKaIzBgoqJKEm42A6Va-EyYk";  
  $response = null;
  $reCaptcha = new ReCaptcha($secret);  
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
  }
  if ($response != null && $response->success) {    
    echo 
    '<script language="javascript">      
      emailjs.send("gmail", "seminariomigracion", {"reply_to":"'.$email.'","from_name":"'.$name.'","to_name":"","message_html":"'.$message.'","phone":"'.$phone.'"});
      var confirmo = confirm("Su mensaje fue enviado, contestaremos con prontitud");
        if (confirmo){
          location.href ="contacto.html";
        }
    </script>';     
  } else {
    echo 
    '<script language="javascript">            
      var confirmo2 = confirm("Reintente y no olvide validar correctamente el ultimo campo");
        if (confirmo2){
          location.href ="contacto.html";
        }
    </script>';     
  }
?>