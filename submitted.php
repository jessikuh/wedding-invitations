<?php
include_once('partials/db.php');

    if(isset($_POST['update'])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $pfname = mysqli_real_escape_string($conn, $_POST["pfname"]);
        $plname = mysqli_real_escape_string($conn, $_POST["plname"]);
        $travel = mysqli_real_escape_string($conn, $_POST["traveling"]);

        $rsvp = mysqli_real_escape_string($conn, $_POST['rsvp']);
        $bringing_plus_one = $_POST['bringing_plus_one'];
        $bringing_kids = $_POST['bringing_kids'];
        $songs = mysqli_real_escape_string($conn, $_POST['songs']);
        $allergies = mysqli_real_escape_string($conn, $_POST['allergies']);
        $comments = mysqli_real_escape_string($conn, $_POST['additional_comments']);

        if($lname === $plname) {
            $names = $fname . " & " . $pfname . " " . $lname;
        } elseif ($pfname) {
            $names = $fname . " " . $lname . " & " . $pfname . " " . $plname;
        } else {
            $names = $fname . " " . $lname;
        }

        if($rsvp == "Duh. I\'m in your wedding party. Do I have a choice?") {
            $rsvp_answer = "Attending";
        } elseif($rsvp == "Two words. Free. Booze.") {
            $rsvp_answer = "Attending";
        } elseif($rsvp == "This is my chance to catch the bouquet!") {
            $rsvp_answer = "Attending";
        } elseif($rsvp == "I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.") {
            $rsvp_answer = "Attending";
        } elseif($rsvp == "I can only make it to the ceremony.") {
            $rsvp_answer = "Attending ceremony";
        } elseif($rsvp == "I can only make it to the reception.") {
            $rsvp_answer = "Attending reception";
        } elseif($rsvp == "I can\'t. I have a totally legitimate excuse.") {
            $rsvp_answer = "Not attending";
        } elseif($rsvp == "No, I\'m lame.") {
            $rsvp_answer = "Not attending";
        } elseif($rsvp == "I\'ll be visiting um, Stormwind. Yeah, Stormwind. You can mail me at 123 Stormwind City, Elwynn Forest.") {
            $rsvp_answer = "Not attending";
        } elseif($rsvp == "I wish I could be there, but *insert excuse for declining here*.") {
            $rsvp_answer = "Not attending";
        } elseif($rsvp === NULL) {
            $rsvp_answer = '';
        }
        $title = 'Your RSVP has been sent!';
        include('layouts/header.php');

        $query2 = "UPDATE guests SET additional_comments = '$comments', bringing_plus_one = '$bringing_plus_one', bringing_kids = '$bringing_kids', RSVP = '$rsvp', food_allergies = '$allergies', song_choices = '$songs', rsvp_answer = '$rsvp_answer' WHERE email ='".$email."'";

        $update = mysqli_query($conn, $query2);
        $conn->close();

        if($update) {
            echo '<div class="rsvped" style="margin-bottom: 2em; text-align: center;">Your RSVP has been submitted.</div>';
?>

    <div class="invited">
        <?=$names?>,
    </div>

    <div style="text-align: center;">
        <?php include('partials/back-details.php'); ?>
    </div>

    <?php include('partials/back-invitation.php'); ?>

    <img src="images/flowers-side-cropped.png" style="bottom: -150px; left: 0; position: absolute; z-index: 1;">

<?php

             include('layouts/footer.php');
        }

        if($rsvp == "Duh. I\'m in your wedding party. Do I have a choice?") {
            $rsvpJess = "Attending";
            $rsvpAnswer = "We are so excited that you'll be able to join us! Sorry you didn't get a choice. ;D";
        } elseif($rsvp == "Two words. Free. Booze.") {
            $rsvpJess = "Attending";
            $rsvpAnswer = "We are so excited that you'll be able to join us, even if it's just for the booze. ;D";
        } elseif($rsvp == "This is my chance to catch the bouquet!") {
            $rsvpJess = "Attending";
            $rsvpAnswer = "We are so excited that you'll be joining us! I'll be rooting that you catch the bouquet! :D";
        } elseif($rsvp == "I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.") {
            $rsvpJess = "Attending";
            $rsvpAnswer = "We are so excited that you'll be able to join us! I can guarantee the questionable dancing won't disappoint. ;D";
        } elseif($rsvp == "I can only make it to the ceremony.") {
            $rsvpJess = "Attending ceremony";
            $rsvpAnswer = "We're so glad that you'll be able to join us for the ceremony!";
        } elseif($rsvp == "I can only make it to the reception.") {
            $rsvpJess = "Attending reception";
            $rsvpAnswer = "We're so glad that you'll be able to join us for the reception!";
        } elseif($rsvp == "I can\'t. I have a totally legitimate excuse.") {
            $rsvpJess = "Not attending";
            $rsvpAnswer = "We are so bummed you wont be able to make it, but thank you for RSVPing! We hope you enjoy your legitimate excuse more than our wedding. ;D";
        } elseif($rsvp == "No, I\'m lame.") {
            $rsvpJess = "Not attending";
            $rsvpAnswer = "We are so bummed you won't be able to make it, but thank you for RSVPing!";
        } elseif($rsvp == "I\'ll be visiting um, Stormwind. Yeah, Stormwind. You can mail me at 123 Stormwind City, Elwynn Forest.") {
            $rsvpJess = "Not attending";
            $rsvpAnswer = "We are so bummed you won't be able to make it, but thank you for RSVPing! We hope you enjoy your stay in Stormwind. ;D";
        } elseif($rsvp == "I wish I could be there, but *insert excuse for declining here*.") {
            $rsvpJess = "Not attending";
            $rsvpAnswer = "We are so bummed you won't be able to make it, but thank you for RSVPing!";
        } else {
            $rsvp = '';
        }

        if($rsvpJess == "Attending") {
            $timeline = '<h2 style="margin: 10px 0 0;">Wedding Details</h2>
            <p>To keep things simple, both the ceremony and the reception will be held at <a href="https://www.co.brown.wi.us/departments/page_c5caa1e1b96c/?department=260ed145263d&subdepartment=dadc284c6c54" target="_blank">Pamperin Park</a>. The ceremony will be held outside if the weather is nice and comfortable. We\'ll also be providing some food and beer, but you\'re more than welcome to bring your own! The reception will wrap up around 9:00pm in order to clean up, but feel free to stick around to see if there\'ll be an after party. (We\'ll likely go venture around downtown Green Bay!) All we ask is that you have a great time and don\'t forget to use our hashtag, #dancingwiththestamos, for any pictures!</p>

            <h2 style="margin: 10px 0 0;">Wedding Timeline</h2>
            <ul>
                <li>2:00pm - Ceremony</li>
                <li>2:30pm - Socializing</li>
                <li>3:00pm - Food</li>
                <li>3:30pm - Games</li>
                <li>4:00pm - Cake cutting</li>
                <li>5:00pm - Dancing</li>
                <li>9:00pm - Goodbyes</li>
            </ul>

            <h2 style="margin: 10px 0 0;">Pamperin Park Address</h2>
            <p><a href="https://www.google.com/maps?ll=44.545164,-88.101257&z=16&t=m&hl=en-US&gl=US&mapclient=embed&cid=10290409046177146861" target="_blank">2801 County RK,<br />
            Green Bay, WI 54303</a></p>
            ';
        } else {
            $timeline = '';
        }

        if($travel == 1 && $rsvpJess == "Attending") {
            $tips = '<h2 style="margin: 10px 0 0;">Travel Tips</h2>
                <b>Airport</b>: Austin Straubel International Airport (GRB) [20 min. away] or Appleton International Airport (ATW) [45 min. away]
                <br /><b>Hotels</b>: <a href="http://www.marriott.com/hotels/travel/grbsh-springhill-suites-green-bay/?scid=bb1a189a-fec3-4d19-a255-54ba596febe2" target="_blank">SpringHill Suites by Marriott Green Bay</a>, <a href="http://hamptoninn3.hilton.com/en/hotels/wisconsin/hampton-inn-green-bay-GRBWIHX/index.html" target="_blank">Hampton Inn Green Bay</a>, or <a href="http://hamptoninn3.hilton.com/en/hotels/wisconsin/hampton-inn-green-bay-downtown-GRBHXHX/index.html" target="_blank">Hampton Inn Green Bay Downtown</a>
                <br /><b>Tolls</b>: If you\'re driving, there are tolls! Don\'t forget to bring cash. From TN, there\'s typically about 5 depending on the way you go varying from $1.10 to $2.50 (typically $1.50).
                <br /><b>Time Zone</b>: Green Bay, WI is CST time. If you\'re coming from EST, time will change to be an hour behind.<br /><br />';
        } else {
            $tips = '';
        }

        if($bringing_plus_one == 'Yes') {
            $b_plus_one = "Yes";
        } elseif($bringing_plus_one == 'No') {
            $b_plus_one = "No";
        } else {
            $b_plus_one = "N/A";
        }

        if($bringing_kids == 'Yes') {
            $b_kids = "Yes";
        } elseif($bringing_kids == 'No') {
            $b_kids = "No";
        } else {
            $b_kids = "N/A";
        }

        // Mails when someone RSVPs
        require_once('Mail.php');
        require_once('Mail/mime.php');

        $host = get_env('MAIL_FROM');
        $port = get_env('MAIL_PORT');
        $username = get_env('MAIL_USERNAME');
        $password = get_env('MAIL_PASSWORD');

        // Email to me when someone RSVPs
        $from = get_env('FROM');
        $to = get_env('FROM');
        $subject = $names . ' RSVPed!';
        $html = "<html><body><div style='line-height: 1.75;'><div style='font-size: 18px';><b>Names</b>: " . $names . "<br /><b>RSVP</b>: " . $rsvpJess . "</div><br /><b>Full RSVP</b>: " . $rsvp . "<br /><b>Bringing Plus One?</b>: " . $b_plus_one . "<br /><b>Bringing kids?</b>: " . $b_kids . "<br /><b>Food Allergies</b>: " . $allergies . "<br /><br /><b>Song Choices</b>: " . $songs . "<br /><b>Additional Comments</b>: " . $comments . "</div></body></html>";

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

        // Confirmation email to RSVPer
        $rsvpTo = $fname . " " . $lname . " <" . $email . ">";
        $rsvpSubject = 'Thank you for RSVPing to the Pittman-Stamos Wedding!';
        $rsvpHtml = "<html><body><div style='line-height: 1.75;'>Dear " . $names . ",<p>" . $rsvpAnswer . "</p>" . $timeline . $tips . "Sincerely,<br />Jessica Pittman & Alex Stamos</div></body></html>";

        $rsvpHeaders = [
            'From' => $from,
            'To' => $rsvpTo,
            'Subject' => $rsvpSubject
        ];

        $rsvpMime = new Mail_mime(['eol' => $crlf]);
        $rsvpMime->setHTMLBody($rsvpHtml);
        $rsvpBody = $rsvpMime->get();
        $rsvpHeaders = $rsvpMime->headers($rsvpHeaders);

        $mailRsvp = $smtp->send($rsvpTo, $rsvpHeaders, $rsvpBody);
    } else {
        include('index.php');
    }
?>