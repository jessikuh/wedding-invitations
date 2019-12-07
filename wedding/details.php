<?php
    include_once('partials/db.php');        

    if(isset($_POST['email'])) {
        $title = 'The Wedding Deets';
        include('layouts/header.php');

        $email = $_POST['email'];
        $query = "SELECT * FROM guests WHERE email = '".$email."'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $rsvp = $row['RSVP'];
            $travel = $row['traveling'];
        }
    ?>

    <h1>Wedding Details</h1>
    <hr />

    <div class="hashtag">
        #dancingwiththestamos
    </div>
    <p style="text-align: justify;">
        To keep things simple, both the ceremony and the reception will be held at <a href="https://www.co.brown.wi.us/departments/page_c5caa1e1b96c/?department=260ed145263d&subdepartment=dadc284c6c54" target="_blank">Pamperin Park</a>. The ceremony will be held outside if the weather is nice and comfortable. We'll also be providing some food and beer, but you're more than welcome to bring your own! The reception will wrap up around 9:00pm in order to clean up, but feel free to stick around to see if there'll be an after party. (We'll likely go venture around downtown Green Bay!) All we ask is that you have a great time and don't forget to use our hashtag, <u>#dancingwiththestamos</u>, for any pictures!
    </p>
    
    <hr style="margin: 1.5em auto;" />

    <ul class="timeline">
        <li>
            <div class="positioning one">
                <div class="bubble">
                    2:00pm Ceremony
                </div><div class="marker-r"></div>
            </div>
        </li>
        <li>
            <div class="positioning two">
                <div class="marker-l"></div><div class="bubble">
                    2:30pm Socializing
                </div>
            </div>
        </li>
        <li>
            <div class="positioning three">
                <div class="bubble">
                    3:00pm Food
                </div><div class="marker-r"></div>
            </div>
        </li>
        <li>
            <div class="positioning four">
                <div class="marker-l"></div><div class="bubble">
                    3:30pm Games
                </div>
            </div>
        </li>
        <li>
            <div class="positioning five">
                <div class="bubble">
                    4:00pm Cake cutting
                </div><div class="marker-r"></div>
            </div>
        </li>
        <li>
            <div class="positioning six">
                <div class="marker-l"></div><div class="bubble">
                    5:00pm Dancing
                </div>
            </div>
        </li>
        <li>
            <div class="positioning seven">
                <div class="bubble">
                    9:00pm Goodbyes
                </div><div class="marker-r"></div>
            </div>
        </li>
    </ul>

    <br />
    <hr style="margin: 0 auto 1.5em;" />

    <div style="text-align: center;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2843.5342537739243!2d-88.1034454837909!3d44.54516810231107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8802f74f89454d47%3A0x8ecee081aedae7ed!2sPamperin+Park!5e0!3m2!1sen!2sus!4v1508259823452" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>

    <?php if($travel) { ?>
        <br />
        <hr style="margin: 0 auto 1em;" />
        <div style="font-size: 0.9em; padding: 0 0 1em;">
            <span style="font-size: 1.4em; font-weight: 900; text-transform: uppercase;">Travel Tips</span>
            <p>
                <strong>Airport</strong>: Austin Straubel International Airport (GRB) [20 min.] or Appleton International Airport (ATW) [45 min.]
            </p>
            <p>
                <strong>Hotels</strong>: <a href="http://www.marriott.com/hotels/travel/grbsh-springhill-suites-green-bay/?scid=bb1a189a-fec3-4d19-a255-54ba596febe2" target="_blank">SpringHill Suites by Marriott Green Bay</a>, <a href="http://hamptoninn3.hilton.com/en/hotels/wisconsin/hampton-inn-green-bay-GRBWIHX/index.html" target="_blank">Hampton Inn Green Bay</a>, or <a href="http://hamptoninn3.hilton.com/en/hotels/wisconsin/hampton-inn-green-bay-downtown-GRBHXHX/index.html" target="_blank">Hampton Inn Green Bay Downtown</a>
            </p>
            <p>
                <strong>Tolls</strong>: <span style="color: #ff0000; font-weight: bold;">If you're driving, there are tolls!</span> Don't forget to bring cash. From TN, there's typically about 5 depending on the way you go varying from $1.10 to $2.50 (typically $1.50).
            </p>
            <p>
                <strong>Time Zone</strong>: Green Bay, WI is CST time. If you're coming from EST, time will be an hour behind.
            </p>
        </div>
        <hr style="margin: 0 auto 1em;" />
    <?php } ?>

    <?php if(empty($rsvp)) {
        include('partials/back-rsvp.php');
    } ?>

    <br />
    <br />
    <?php include('partials/back-invitation.php');?>

<?php
    
    include('layouts/footer.php');
    } else {
        include('index.php');
    }
?>
