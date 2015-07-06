<?php 
// if(isset($_POST['submit'])){
    $to = "shammspk3@gmail.com"; // this is your Email address
    $from = "ajeebkt@gmail.com"; // this is the sender's Email address
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    // $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message = "Here is a copy of your message " ;#. $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " ;
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    
?>