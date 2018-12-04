<<?php

  $error = ""; $successMessage = "";

  if ($_POST) {

  if (!$_POST["email"]) {

    $error .= "The email address is missing.<br>";

  }

  if (!$_POST["message"]) {

    $error .= "The messega is missing.<br>";

  }

  if (!$_POST["subject"]) {

    $error .= "The subject is missing.<br>";

  }

  if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

    $error .= "The email address is not valid.<br>";

}

  if ($error != "") {

    $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>'
    . $error . '</div>';

  } else {

    $emailTo = "info@tszabo088.com";

    $subject = $_POST['subject'];

    $message = $_POST['message'];

    $headers = "From: ".$_POST['email'];

    if (mail($emailTo, $subject, $message, $headers)) {

      $successMessage = '<div class="alert alert-success" role="alert">Your message was sent.</div>';

    } else {

      $error = '<div class="alert alert-danger" role="alert"><p>Your message couldn\'t be sent. Please try again later</p></div>';


    }

  }

}

 ?>



<!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <title>PHP email contact form</title>
      </head>

      <body>

          <div class="container">
            <h1>Get in touch!</h1>

            <div id="error"><? echo $error.$successMessage; ?></div>

            <form method="post">
            <fieldset class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
            </fieldset>
            <fieldset class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
            </fieldset>
            <fieldset class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </fieldset>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

        <script type="text/javascript">

        $("form").submit(function(e){

        var error = "";

        if ($("#email").val() == "") {

          error += "The email is missing<br>";
        }

        if ($("#subject").val() == "") {

          error += "The subject is missing<br>";
        }

        if ($("#message").val() == "") {

          error += "The message is missing. Nothing to send!<br>";
        }

        if (error != "") {

           $("#error").html('<div class="alert alert-danger" role="alert"><p><u>There were error(s) in your form:</u></p>'
           + error + '</div>');

           return false;

        }  else {

          return true;
        }

    });


        </script>
      </body>
      </html>
