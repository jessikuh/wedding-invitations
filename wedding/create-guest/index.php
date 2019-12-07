<?php
    $title = 'Add Guest';
    include('layouts/header.php'); ?>

<div style="align-items: center; display: flex; height: 880px; justify-content: center;">
    <div class="index">
        <h1 class="purple2">Create Guests' Invitation</h1>
        <hr style="background-color: #3f3f3f; width: 60%;" />

        <?php require('add.php') ?>

            <form action="<?php $_PHP_SELF ?>" method="post">
                <div class="effect-container">
                    <input class="effect" type="text" name="email">
                    <label>Email</label>
                </div>
                <div style="clear: both; text-align: left;">
                    <div style="display: inline-block;">
                        <div class="effect-container">
                            <input class="effect" type="text" name="fname">
                            <label>First Name</label>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div class="effect-container">
                            <input class="effect" type="text" name="lname">
                            <label>Last Name</label>
                        </div>
                    </div>
                </div>
                <div style="clear: both; text-align: left;">
                    <div style="display: inline-block;">
                        <div class="effect-container">
                            <input class="effect" type="text" name="pfname">
                            <label>Plus One First Name</label>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div class="effect-container">
                            <input class="effect" type="text" name="plname">
                            <label>Plus One Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="effect-container" style="margin-bottom: 3rem;">
                    <select class="effect" name="traveling">
                        <option value=""></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label>Traveling?</label>
                </div>
                <div class="effect-container" style="margin-bottom: 3rem;">
                    <select class="effect" name="plus_one">
                        <option value=""></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label>Has a plus one?</label>
                </div>
                <div class="effect-container">
                    <select class="effect" name="has_kids">
                        <option value=""></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label>Has kids?</label>
                </div>
            <br />
            <input class="create" name="update" type="submit" value="Create Invitation">
        </form>
    </div>
</div>
    
<?php include('layouts/footer.php'); ?>