<?php $title = 'Stamos Wedding Invitation';
include 'layouts/header.php' ?>

<div class="index">

    <h1 class="purple3">Invitation</h1>
    <hr style="background-color: #3f3f3f; margin: 0 auto 1.5em; width: 20%;" />
    <div class="purple2" style="font-size: 0.85em; font-weight: 900; line-height: 1.5; margin: 2rem 0 2rem; text-transform: uppercase;">Enter your email address<br />to access your invitation</div>

    <form action="invitation.php" method="post">
        <div class="effect-container" style="display: block; margin: 0 auto 0.5em;">
            <input class="effect" name="email" type="text">
            <label>Your email</label>
        </div>
        <input class="get-invite" type="submit" value="Get Invitation">
    </form>

    <img src="images/flowers-bottom.png" style="bottom: -4px; position: absolute; right: -150px;">

</div>

<script>
console.log($('.purple2').html());
</script>

<?php include('layouts/footer.php'); ?>