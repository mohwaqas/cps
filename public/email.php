<?php
    $to      = 'zaynub@cleanpowerstore.com';
    $subject = 'Cleanpowerstore New Customer Signup ';
    $message = 'Name: '.$_REQUEST['name'].'  Email:  '.$_REQUEST['email'];
    $headers = 'From: info@cleanpowerstore.com'       . "\r\n" .
                 'Reply-To: info@cleanpowerstore.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
   // $headers .= 'Cc: waqas.ger@gmail.com' . "\r\n";             

    $ret = mail($to, $subject, $message, $headers);


 
?>


<?php
    $to      = 'sofia@cleanpowerstore.com';
    $subject = 'Cleanpowerstore New Customer Signup ';
    $message = 'Name: '.$_REQUEST['name'].'  Email:  '.$_REQUEST['email'];
    $headers = 'From: info@cleanpowerstore.com'       . "\r\n" .
                 'Reply-To: info@cleanpowerstore.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
   // $headers .= 'Cc: waqas.ger@gmail.com' . "\r\n";             

    $ret = mail($to, $subject, $message, $headers);


 
?>


<script>location.href='https://cleanpowerstore.com'</script>