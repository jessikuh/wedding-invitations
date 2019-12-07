<?php 
include_once('partials/db.php');

if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $query = "SELECT * FROM guests WHERE email = '".$email."'";
        $result = mysqli_query($conn, $query);
?>

    <form action="submitted.php" method="post">
    <?php
        $found = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $pfname = $row['plus_one_first_name'];
            $plname = $row['plus_one_last_name'];
            $plus_one = $row['plus_one'];
            $travel = $row['traveling'];
            $bringing_plus_one = $row['bringing_plus_one'];
            $kids = $row['has_kids'];
            $bringing_kids = $row['bringing_kids'];
            $rsvp = $row['RSVP'];
            $allergies = $row['food_allergies'];
            $songs = $row['song_choices'];
            $comments = $row['additional_comments'];
            
            if($lname === $plname) {
                $names = $fname . " & " . $pfname . " " . $lname;
            } elseif ($pfname) {
                $names = $fname . " " . $lname . " & " . $pfname . " " . $plname;
            } else {
                $names = $fname . " " . $lname;
            }
            $title = 'RSVP for ' . $names;
            include('layouts/header.php');
    ?>

    <div class="invited">
        <?=$names?>,
    </div>

    <h1>Respondez, s'il vous plait</h1>
    <hr />
    
    <div class="rsvp-box">
        <input type="hidden" name="email" value="<?=$email?>">
        <input type="hidden" name="fname" value="<?=$fname?>">
        <input type="hidden" name="lname" value="<?=$lname?>">
        <input type="hidden" name="pfname" value="<?=$pfname?>">
        <input type="hidden" name="plname" value="<?=$plname?>">
        <input type="hidden" name="traveling" value="<?=$travel?>">

        <div class="rsvp-left">
            Will you be there?
        </div>
        <div class="rsvp-right">
            <div class="rsvp-options">
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="Duh. I'm in your wedding party. Do I have a choice?" required />
                    </div><!--
                    --><div class="rsvp-option">
                        Duh. I'm in your wedding party. Do I have a choice?
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="Two words. Free. Booze." />
                    </div><!--
                    --><div class="rsvp-option">
                        Two words. Free. Booze.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="This is my chance to catch the bouquet!" />
                    </div><!--
                    --><div class="rsvp-option">
                        This is my chance to catch the bouquet!
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="I would never dream of missing it! After all, it's bound to be a night full of questionable dancing." />
                    </div><!--
                    --><div class="rsvp-option">
                        I would never dream of missing it! After all, it's bound to be a night full of questionable dancing.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="I can only make it to the ceremony." />
                    </div><!--
                    --><div class="rsvp-option">
                        I can only make it to the ceremony.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="I can only make it to the reception." />
                    </div><!--
                    --><div class="rsvp-option">
                        I can only make it to the reception.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="I can't. I have a totally legitimate excuse." />
                    </div><!--
                    --><div class="rsvp-option">
                        I can't. I have a totally legitimate excuse.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="No, I'm lame." />
                    </div><!--
                    --><div class="rsvp-option">
                        No, I'm lame.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="I'll be visiting um, Stormwind. Yeah, Stormwind. You can mail me at 123 Stormwind City, Elwynn Forest." />
                    </div><!--
                    --><div class="rsvp-option">
                        I'll be visiting um, Stormwind. Yeah, Stormwind. You can mail me at 123 Stormwind City, Elwynn Forest.
                    </div>
                </div>
                <div style="padding: 0 0 5px;">
                    <div class="rsvp-checkbox">
                        <input type="radio" name="rsvp" value="I wish I could be there, but *insert excuse for declining here*." />
                    </div><!--
                    --><div class="rsvp-option">
                        I wish I could be there, but *insert excuse for declining here*.
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="rsvp-left">
            Song Request(s)
        </div>
        <div class="rsvp-right">
            <textarea type="text" name="songs"><?=$songs?></textarea>
        </div>
        <br />
        <br/>
        <div class="rsvp-left">
            Any food allergies?
        </div>
        <div class="rsvp-right">
            <textarea name="allergies"><?=$allergies?></textarea>
        </div>
        <?php if($plus_one == 1) { ?>
        <br/>
        <br/>
        <div class="rsvp-left">
            Bringing a plus one?
        </div>
        <div class="rsvp-right">
            <select name="bringing_plus_one">
                <?php if(empty($bringing_plus_one)) {
                    echo '<option value=""></option>';
                } else {
                    echo '<option value="' . $bringing_plus_one . '">' . $bringing_plus_one . '</option>';
                } ?>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <?php } else {
            echo '<input type="hidden" name="bringing_plus_one" value="">';
        } ?>

        <?php if($kids == 1) { ?>
        <br/>
        <br/>
        <div class="rsvp-left">
            Will you be bringing your kid(s)?
        </div>
        <div class="rsvp-right">
            <select name="bringing_kids">
                <?php if(empty($bringing_kids)) {
                    echo '<option value=""></option>';
                } else {
                    echo '<option value="' . $bringing_kids . '">' . $bringing_kids . '</option>';
                } ?>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <?php } else {
            echo '<input type="hidden" name="bringing_kids" value="">';
        } ?>
        <br />
        <br />
        <div class="rsvp-left">
            Anything else?
        </div>
        <div class="rsvp-right">
            <textarea type="text" name="additional_comments"><?=$comments?></textarea>
        </div>
        <br />
        <br />
        <input class="update" name="update" type="submit" id="update" value="Send RSVP">
        </form>
        
        <div class="details">
            <?php include('partials/back-details.php');?>
        </div>

        <?php include('partials/back-invitation.php');?>
    </div>

    <img src="images/flowers-bottom.png" style="bottom: -2px; position: absolute; right: -100px; pointer-events: none; width: 50%; z-index: 1;">
<?php

    include('layouts/footer.php');
}

        $conn->close();
    } else {
    include('index.php');
}
?>