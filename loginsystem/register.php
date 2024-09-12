<?php require_once('./partials/header.php') ?>



<!-- Sign UP -->
<?php

require_once('./connect.php');

if (isset($_POST['signup'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $emailreg = $_POST['emailreg'];
    $passwordreg = $_POST['passwordreg'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname,username,email,password) VALUES
     ('$fullname','$username','$emailreg','$passwordhash')";

    if (empty($fullname) or empty($username) or empty($emailreg) or empty($passwordreg)) {
        header("LOCATION: register.php?msg=danger");
    } else {
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("LOCATION: register.php?msg=success");
        } else {
            header("LOCATION: register.php?msg=danger");
        }
    }
}


?>
<div class="container" style="max-width: 600px;">
    <?php if (isset($_REQUEST['msg'])) : ?>
        <div class="notification is-<?php echo $_REQUEST['msg'] ?>">
            <button class="delete"></button>
            <?php if ($_REQUEST['msg'] == 'success') : ?>
                <p>Your Registion IsVlid</p>
            <?php elseif ($_REQUEST['msg'] === 'danger') : ?>
                <p>Your Registion IsInvlid</p>
            <?php endif ?>

        </div>
    <?php endif ?>
    <section class="section is-small">
        <h4 class="title">Sign Up</h4>
        <form method="post">
            <div class="field">
                <label class="label">Full Name</label>
                <div class="control">
                    <input name="fullname" class="input" type="text" placeholder="Your Full Name">
                </div>
            </div>
            <div class="field">
                <label class="label">User Name</label>
                <div class="control">
                    <input name="username" class="input" type="text" placeholder="Your User Name">
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input name="emailreg" class="input" type="email" placeholder="Your Email">
                </div>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input name="passwordreg" class="input" type="password" placeholder="password">
                </div>
            </div>
            <div class="control">
                <button name="signup" class="button is-link">Sign Up</button>
            </div>
        </form>
    </section>


</div>
<!--  Sign up -->



<?php require_once('./partials/footer.php') ?>