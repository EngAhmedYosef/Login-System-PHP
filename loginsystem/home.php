<?php require_once('./partials/header.php') ?>

<?php 

session_start();

?>
    <!-- home page -->

    <section class="hero">
        <div class="hero-body">
            <?php if(isset($_SESSION['user'])) : ?>
            <p class="subtitle">
                Welcom: <?php echo $_SESSION['user']['username'] ?> 
            </p>
            <p class="subtitle">
            Your Id: <?php echo $_SESSION['user']['id'] ?> 

            </p>

            <p class="subtitle">
            Your Email: <?php echo $_SESSION['user']['email'] ?> 

            </p>

            <a href="logout.php" class="button is-primry">Log Out</a>

        </div>
        <?php else : ?>
        <p class="title">You Must Login...</p>
        <?php endif ?>
    </section>

    <!-- home page -->






    <?php require_once('./partials/footer.php') ?>

   