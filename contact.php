<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  </head>
  <body >
  
    <div class="contact-section">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>Address: New York,America
      </div>
        <div><i class="fas fa-envelope"></i>Mail-id: avengersrestaurant@email.com</div>
        <div><i class="fas fa-phone"></i> M.No: 091-987-654-3210</div>
        <div><i class="fas fa-clock"></i> Open time: Mon - Fri 8:00 AM to 5:00 PM</div>
      </div>
      <div class="contact-form">
        <h2>Contact Us</h2>
        <form class="contact" action="" method="POST">
          <input type="text" name="Name" class="text-box" placeholder="Your Name" required>
          <input type="email" name="Mail" class="text-box" placeholder="Your Email" required>
          <textarea name="Message" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="send">

        </form>
        <?php
          if(isset($_POST['submit']))
          {
            $name=$_POST['Name'];
            $mail=$_POST['Mail'];
            $message=$_POST['Message'];
            $sql="INSERT INTO tbcontact SET name='$name', mail='$mail',message='$message' ";
            //echo $sql;
            $res=mysqli_query($conn , $sql) or die(mysqli_error());
            if($res==true)
            {
                $_SESSION['contact']="<div class='msg text-center'> Feedback sends Successfully.</div>";
                header('location:'.HOMEURL);

            }
            else
            {
                $_SESSION['contact']="<div class='error text-center'> Failed To send Feedback.</div>";
                header('location:'.HOMEURL);
            }
          }
        ?>
      </div>
    </div>

    <!--contact section end-->

  </body>
</html>
      