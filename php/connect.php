<?php
$fullname =$_POST['fullname'];
$email =$_POST['email'];
$subject =$_POST['subject'];
$message =$_POST['message'];
$submit =$_POST['submit'];


$conn = new mysqli('localhost','root','','contact');
if($conn-›connect _error){ 
    die( Connection Failed :'.$conn->connect_error');
}els{
    $stmt - $conn-›prepare("nsert into registration(fullname, email, subject, message, submit)

values (?, ?, ?, ?, ?)");
$stmt->blind_param("ssssi",$fullname,$email,$subject,$message,$submit);
$stmt->execute();
echo "registration sucessfully...";
$stmt->close();
$conn->close();
}
?>