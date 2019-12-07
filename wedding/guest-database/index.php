<?php
    $title = 'RSVP Log';
    include('header.php');
    include_once('../partials/db.php');
?>

    <style type="text/css">
    .more-deets-link {
        cursor: pointer;
        display: block;
        font-size: 13px;
        margin: 0.35rem 0 0;
    }
    .more-deets {
        border-top: 1px solid #B398D0;
        font-size: 13px;
        height: 225px;
        opacity: 1;
        transition: opacity 0.3s ease-in-out, height 0.3s ease-in-out;
    }
    .vis {
        height: 0;
        opacity: 0;
        overflow: hidden;
    }

    @media only screen and (max-width: 768px) {
        .more-deets {
            height: 300px;
        }

        .vis {
            height: 0;
        }
    }
    </style>

    <script type="text/javascript">
    $(function() {
        $('.more-deets-link').on('click', function(){
            $(this).parent('div:first').parent().parent().find('.more-deets').toggleClass('vis');
        });
    });
    </script>

<h1 class="purple2">Invitation Database</h1>
<hr style="background-color: #3f3f3f; width: 40%;" />

<div style="display: table; border-spacing: 10px 0; width: 100%;">
    <div style="display: table-cell; width: 35%;">
        <a href="?sort=name">First Name</a>,&nbsp;<a href="?sort=last">Last Name</a>
    </div>

    <div style="display: table-cell; margin: 0 15px 0 0; width: 35%;">
        <a href="?sort=name2">Name</a>
    </div>

    <div style="display: table-cell; width: 30%;">
        <a href="?sort=rsvp">RSVP</a>
    </div>
</div>
<?php
    $query = "SELECT * FROM guests";
    if ($_GET['sort'] == 'name') {
        $query .= " ORDER BY first_name";
    } elseif($_GET['sort'] == 'last') {
        $query .= " ORDER BY last_name";
    } elseif($_GET['sort'] == 'name2') {
        $query .= " ORDER BY if(plus_one_first_name = '' or plus_one_first_name is null,1,0),plus_one_first_name";
    }  elseif($_GET['sort'] == 'rsvp') {
        $query .= " ORDER BY if(rsvp_answer = '' or rsvp_answer is null,1,0),rsvp_answer";
    }

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $pfname = $row['plus_one_first_name'];
        $plname = $row['plus_one_last_name'];
        $plus_one = $row['bringing_plus_one'];
        $kids = $row['bringing_kids'];
        $rsvp_full = $row['RSVP'];
        $rsvp = $row['rsvp_answer'];
        $food = $row['food_allergies'];
        $songs = $row['song_choices'];
        $comments = $row['additional_comments'];
        $guestCount = 0;
        $invitedCount = 0;

        if($rsvp == "Attending") {
            $rsvp = '<font color="green">Attending</font>';
            $guestCount = $guestCount + 1;
            if(!$pfname == NULL || !$pfname == '') {
                $guestCount = $guestCount + 1;
            } elseif($plus_one == 'Yes') {
                $guestCount = $guestCount + 1;
            }
        } elseif($rsvp == "Attending ceremony") {
            $rsvp = '<font color="green">Attending ceremony</font>';
            $guestCount = $guestCount + 1;
            if(!$pfname == NULL || !$pfname == '') {
                $guestCount = $guestCount + 1;
            } elseif($plus_one == 'Yes') {
                $guestCount = $guestCount + 1;
            }
        } elseif($rsvp == "Attending reception") {
            $rsvp = '<font color="green">Attending reception</font>';
            $guestCount = $guestCount + 1;
            if(!$pfname == NULL || !$pfname == '') {
                $guestCount = $guestCount + 1;
            } elseif($plus_one == 'Yes') {
                $guestCount = $guestCount + 1;
            }
        } elseif($rsvp == "Not attending") {
            $rsvp = '<font color="red">Not attending</font>';
        }

        if($fname) {
            $invitedCount = $invitedCount + 1;
            if(!$pfname == NULL || !$pfname == '') {
                $invitedCount = $invitedCount + 1;
            } elseif($plus_one == 'Yes') {
                $invitedCount = $invitedCount + 1;
            }
        }

        if($kids) {
            $kids;
        } else {
            $kids = 'N/A';
        }

        if($plus_one) {
            $plus_one;
        } else {
            $plus_one = 'N/A';
        }
?>
    <div style="border-bottom: 1px solid #69539C; line-height: 1.5;">
        <div style="display: table; border-spacing: 10px 0; width: 100%;">
            <div style="display: table-cell; padding: 5px 0; vertical-align: top; width: 35%;">
                <?=$fname?> <?=$lname?>
                <br />
                <a class="more-deets-link">More Details</a>
            </div><!--

            --><div style="background-color: #f6f6f6; display: table-cell; padding: 5px 5px; height: auto; vertical-align: top; width: 35%;">
                <?=$pfname?> <?=$plname?>
            </div><!--
            
            --><div style="display: table-cell; padding: 5px 0; vertical-align: top; width: 30%;">
                <?=$rsvp?>
            </div>
        </div>
        <div class="more-deets vis">
            <div style="padding: 1rem 1em 0;">
                <b>Plus One?</b>: <?=$plus_one?>
                <br />
                <b>Kids?</b>: <?=$kids?>
                <br />
                <br />
                <b>Food Allergies</b>: <?=$food?>
                <br />
                <b>Song Choices</b>: <?=$songs?>
                <br />
                <br />
                <b>RSVP:</b> <?=$rsvp_full?>
                <br />
                <br />
                <b>Comments:</b> <?=$comments?>
            </div>
        </div>
    </div>

<?php

    $guestTotal += $guestCount;
    $invitedTotal += $invitedCount;

} ?>

<div style="line-height: 1.5; margin: 1.75rem 0 0;">
    <b>Total Attending</b>: <?=$guestTotal?>
    <br />
    <br />
    <b>Total invited</b>: <?=$invitedTotal?>
    <br />
    (Neither number counts kids.)
    <br />
    <br />
    <b>Percentage Attending</b>: <?php $percentAttending = (($guestTotal / $invitedTotal) * 100); echo $percentAttending . "%"; ?>
</div>


<?php
include('footer.php');
