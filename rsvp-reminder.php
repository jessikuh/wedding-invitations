<?php
  include_once('partials/db.php');

  $query = "SELECT * FROM guests";

  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $pfname = $row['plus_one_first_name'];
    $plname = $row['plus_one_last_name'];
    $email = $row['email'];
    $rsvp = $row['rsvp_answer'];

    if($lname === $plname) {
        $names = $fname . " & " . $pfname . " " . $lname;
    } elseif ($pfname) {
        $names = $fname . " " . $lname . " & " . $pfname . " " . $plname;
    } else {
        $names = $fname . " " . $lname;
    }

    if($rsvp == NULL) {
      echo 'Sending RSVP Reminder for ' . $names . '<br>';

      require_once('Mail.php');
      require_once('Mail/mime.php');

      $from = get_env('FROM');
      $to = $fname . $lname . " <" . $email . ">";
      $subject = "RSVP Reminder for Pittman-Stamos Wedding";
      $html = "<html><body><div style='line-height: 1.5;'>" . $names . ",<br /><br />You're invited to the Pittman-Stamos Wedding! Please let us know whether you can make it.<br /><br /><a href='http://becoming.jessicastamos.com' target='_blank'>Click here to access your invitation.</a><br />Your invitation is best viewed on a computer or laptop, but is mobile and tablet friendly (just less pretty).<br /><br />We look forward to your RSVP!<br /><br />Sincerely,<br />Jessica Pittman & Alex Stamos</div></body></html>";

      $host = get_env('MAIL_FROM');
      $port = get_env('MAIL_PORT');
      $username = get_env('MAIL_USERNAME');
      $password = get_env('MAIL_PASSWORD');

      $headers = [
          'From' => $from,
          'To' => $to,
          'Subject' => $subject
      ];

      $crlf = "\n";
      $mime = new Mail_mime(['eol' => $crlf]);
      $mime->setHTMLBody($html);
      $body = $mime->get();
      $headers = $mime->headers($headers);

      $smtp = Mail::factory('smtp',
          [
              'host' => $host,
              'port' => $port,
              'auth' => true,
              'username' => $username,
              'password' => $password
          ]
      );

      $mail = $smtp->send($to, $headers, $body);
    }
  }