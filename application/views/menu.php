<nav >
    <a href="<?= base_url('index.php/pets') ?>">Home</a><br />
    <a href="<?= base_url('index.php/pets/about_us') ?>">About Us</a><br />
    <a href="<?= base_url('index.php/pets/contact_us') ?>">Contact Us</a> <br />
    <a href="<?= base_url('index.php/pets/client') ?>">Client</a> <br />
    <a href="<?= base_url('index.php/pets/service') ?>">Service</a> <br />
    <?php
    if(empty($_SESSION['user_data'])){ ?>
        <a href="<?= base_url('index.php/pets/login') ?>">Login</a> <br />
    <?php }
    else { ?>
        <a href="<?= base_url('index.php/pets/logout') ?>">Logout</a> <br />
        <span>Logged in as: <?= $_SESSION['user_data']['user_name'] . "(". $_SESSION['user_data']['role'] .")" ?></span>
    <?php } ?>

</nav>