<script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_iM2t2CIyihiXd7losXBxM");
   })();
</script>

<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Sin argumentos!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

emailjs.send('gmail', 'seminariomigracion', {'reply_to':'email_address','from_name':'$name','to_name':'','message_html':'$message Número de contacto: $phone'})
   
// Create the email and send the message
$to = '00018812@uca.edu.sv'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Consulta seminario migracion, de:  $name";
$email_body = "Se recibio una consulta desde el sitio web con respecto al seminario de migracion.\n\n"."Detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nTelefono: $phone\n\nMensaje:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Contestar a: $email_address";  

mail($to,$email_subject,$email_body,$headers);
return true;         
?>
