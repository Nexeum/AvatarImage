<?php
session_start();
if (empty($_POST['username'])) 
{
    echo  
    "<script>
        windows.alert("Please enter an username.");
    </script>";
} 
else if (!empty($_POST['username'])) 
{
  include_once "avatar.php"; 
  
  $letter = $username[0];
  $nameFirstChar = strtoupper($letter);
  $target_path = createAvatarImage($nameFirstChar);


?>
