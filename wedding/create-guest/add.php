<?php
    $title = 'Guest Added';

    include_once('partials/db.php');

    if(isset($_POST['update'])) {

        // Variables
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $pfname = mysqli_real_escape_string($conn, $_POST["pfname"]);
        $plname = mysqli_real_escape_string($conn, $_POST["plname"]);
        $traveling = mysqli_real_escape_string($conn, $_POST["traveling"]);
        $plus_one = mysqli_real_escape_string($conn, $_POST["plus_one"]);
        $has_kids = mysqli_real_escape_string($conn, $_POST["has_kids"]);

        $query = "INSERT INTO guests (email, first_name, last_name, plus_one_first_name, plus_one_last_name, traveling, plus_one, has_kids) VALUES ('$email', '$fname', '$lname', '$pfname', '$plname', '$traveling', '$plus_one', '$has_kids')";

        $add = mysqli_query($conn, $query);
        $conn->close();

        if($lname === $plname) {
            $names = $fname . " & " . $pfname . " " . $lname;
        } elseif ($pfname) {
            $names = $fname . " " . $lname . " & " . $pfname . " " . $plname;
        } else {
            $names = $fname . " " . $lname;
        }

        if($add) {
            echo 'Successfully created invitation!';
            echo '<hr style="background-color: #3f3f3f;" />';
        }

        // Mail
        require_once('Mail.php');
        require_once('Mail/mime.php');

        $from = get_env('FROM');
        $to = $fname . $lname . " <" . $email . ">";
        $subject = "You're invited to the Pittman-Stamos Wedding!";
        $html = "<html><body><div style='line-height: 1.5;'>" . $names . ",<br /><br />You're invited to the Pittman-Stamos Wedding!<br /><br /><a href='http://becoming.jessicastamos.com' target='_blank'>Click here to access your invitation.</a><br />Your invitation is best viewed on a computer or laptop, but is mobile and tablet friendly (just less pretty).<br /><br />We look forward to your RSVP!<br /><br />Sincerely,<br />Jessica Pittman & Alex Stamos</div></body></html>";

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
?>