<?php
    $to      = 'zaynub@cleanpowerstore.com';
     $subject = 'Cleanpowerstore Contact Us Request';
      $message = '
      Name: '.$_REQUEST['f_name'].' '.$_REQUEST['l_name'].'   
      Email:  '.$_REQUEST['email'].'
      Contact: '.$_REQUEST['contact_number'].'
      Message: '.$_REQUEST['message'];

    $headers = 'From: info@cleanpowerstore.com'       . "\r\n" .
                 'Reply-To: info@cleanpowerstore.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
   // $headers .= 'Cc: waqas.ger@gmail.com' . "\r\n";             

    $ret = mail($to, $subject, $message, $headers);


 
?>


<?php
    $to      = 'sofia@cleanpowerstore.com';
    $subject = 'Cleanpowerstore Contact Us Request';
    $message = '
      Name: '.$_REQUEST['f_name'].' '.$_REQUEST['l_name'].'   
      Email:  '.$_REQUEST['email'].'
      Contact: '.$_REQUEST['contact_number'].'
      Message: '.$_REQUEST['message'];
    $headers = 'From: info@cleanpowerstore.com'       . "\r\n" .
                 'Reply-To: info@cleanpowerstore.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
   // $headers .= 'Cc: waqas.ger@gmail.com' . "\r\n";             

    $ret = mail($to, $subject, $message, $headers);


 
?>


<script>location.href='https://cleanpowerstore.com/contact-us'</script>