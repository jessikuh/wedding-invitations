<?php
include_once('partials/db.php');

if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $query = "SELECT * FROM guests WHERE email = '".$email."'";
        $result = mysqli_query($conn, $query);

    if ($result) {
        $found = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $found = 1;
            $email = $row['email'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $pfname = $row['plus_one_first_name'];
            $plname = $row['plus_one_last_name'];
            $plusOne = $row['plus_one'];
            $rsvp = $row['RSVP'];

            if($lname === $plname) {
                $names = $fname . " & " . $pfname . " " . $lname;
            } elseif ($pfname) {
                $names = $fname . " " . $lname . " & " . $pfname . " " . $plname;
            } else {
                $names = $fname . " " . $lname;
            }

            $title = "Wedding Invitation for " . $names;
            include 'layouts/header.php';

?>

            <div class="invited">
                <?=$names?>,
            </div>
            <div class="names">
                <div class="name purple2">Jess</div>
                <div class="and">and</div>
                <div class="name purple2">Alex</div>
            </div>
            <div class="invite">
                warmly invite you to celebrate with them
                <br/>
                as they become soulbound
                <br/>
                <svg version="1.1" x="0px" y="0px" viewBox="0 0 556.213 556.213" style="enable-background: new 0 0 556.213 556.213; fill: #493583; width: 20%;">
                <g>
		<path d="M173.684,493.875c39.216,0,75.324-13.225,104.423-35.229c29.108,22.014,65.206,35.229,104.422,35.229
			c95.778,0,173.685-77.905,173.685-173.674c0-95.778-77.906-173.684-173.685-173.684c-39.216,0-75.323,13.225-104.422,35.228
			c-29.108-22.013-65.207-35.228-104.423-35.228C77.906,146.518,0,224.423,0,320.201C0,415.96,77.906,493.875,173.684,493.875z
			 M278.106,250.022c13.53,20.062,21.438,44.217,21.438,70.179s-7.908,50.117-21.438,70.179
			c-13.531-20.062-21.439-44.217-21.439-70.179S264.585,270.084,278.106,250.022z M382.538,194.33
			c69.405,0,125.871,56.466,125.871,125.871c0,69.404-56.466,125.861-125.871,125.861c-26.029,0-50.241-7.946-70.332-21.534
			c21.965-29.09,35.161-65.149,35.161-104.327s-13.196-75.248-35.161-104.336C332.297,202.276,356.509,194.33,382.538,194.33z
			 M173.684,194.33c26.029,0,50.241,7.946,70.332,21.535c-21.965,29.089-35.161,65.159-35.161,104.336s13.196,75.237,35.161,104.327
			c-20.091,13.588-44.303,21.534-70.332,21.534c-69.404,0-125.871-56.457-125.871-125.861
			C47.812,250.796,104.279,194.33,173.684,194.33z"/>
		<path d="M274.75,77.868h-0.191c0,0-26.431-28.946-49.496-7.803c-23.065,21.143-2.888,69.854,49.496,90.997l0.191,0.182
			c52.374-21.143,72.56-70.036,49.495-91.178C301.181,48.922,274.75,77.868,274.75,77.868z"/>
	</g>
                </svg>
            </div>

            <br />
            <div class="event">
                <div class="event-day purple2 right">
                        Friday<span class="spacing"> &nbsp;</span>
                </div><!--
                --><div class="event-date purple3">
                        27
                </div><!--
                --><div class="event-day purple2">
                        <span class="spacing">&nbsp; </span>Apr
                </div>
            </div>

            <div class="event-location">
                <strong>Pamperin Park</strong>
                <br />
                <div style="font-family: 'Comfortaa', sans-serif; font-size: 1.15em; margin: 8px 0 5px;">
                2801 County Rd RK,
                <br />
                Green Bay, WI 54303
                </div>
                <small>the dance hall</small>
            </div>

            <div class="rsvp">
                <?php if(empty($rsvp)) { ?>
                    <form action="rsvp.php" method="post">
                        <input type="hidden" name="email" value="<?=$email?>">
                        <input type="submit" value="RSVP" class="btn">
                    </form>
                <?php } else {
                    echo "<div class='rsvped'>You've RSVPed!</div>";
                } ?>


                <?php include('partials/back-details.php');?>
            </div>

            <img src="images/flowers-side-cropped.png" style="bottom: -20px; left: 0; pointer-events: none; position: absolute; width: 50%;">

<?php
        }
        if ($found==0) {
            $title = 'Wedding Invitation Not Found';
            include 'layouts/header.php';
            echo "No invitation found.  <a href='http://becoming.jessicastamos.com'>Try again</a>.";
        }
    }

        $conn->close();
} else {
    $title = 'Wedding Invitation Not Found';
    include 'layouts/header.php';
    echo "No invitation found. <a href='http://becoming.jessicastamos.com'>Try again</a>.";
}

include 'layouts/footer.php';
?>
