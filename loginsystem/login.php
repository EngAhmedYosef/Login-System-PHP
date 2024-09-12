<?php require_once('./partials/header.php') ?>

<?php

require_once('./connect.php');

session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.PHP");
}

if (isset($_POST['login'])) {
    $emaillog = $_POST['emaillog'];
    $passwrdlog = $_POST['passwrdlog'];

    $sql = "SELECT * FROM users WHERE email='$emaillog' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($passwrdlog, $row["password"])) {

            $_SESSION["user"]['id'] = $row["id"];
            $_SESSION["user"]['username'] = $row["username"];
            $_SESSION["user"]['email'] = $row["email"];

            header("Location: home.PHP");
        }
    } else {
        header("LOCATION: login.php?msg=danger");
    }
}

?>

<!-- login  -->

<div class="container" style="max-width: 600px;">

    <?php if (isset($_REQUEST['msg'])) : ?>
        <div class="notification is-<?php echo $_REQUEST['msg'] ?>">
            <button class="delete"></button>
            <?php if ($_REQUEST['msg'] == 'success') : ?>
                <p>You Are Loggedin</p>
            <?php elseif ($_REQUEST['msg'] === 'danger') : ?>
                <p>Invalid Loggedin</p>
            <?php endif ?>

        </div>
    <?php endif ?>

    <section class="section is-small">
        <h4 class="title">Login</h4>
        <form method="post">
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input name="emaillog" class="input" type="email" placeholder="Your Email">
                </div>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input name="passwordlog" class="input" type="password" placeholder="password">
                </div>
            </div>
            <div class="control">
                <button name="login" class="button is-link">Login</button>
            </div>
        </form>
    </section>


</div>

<!-- login -->


<?php require_once('./partials/footer.php') ?>