<div id="wrapper">
    <header>
        <h1> Pet Store </h1>
    </header>
    <div class="container">
        <?php include_once "menu.php" ?>
        <div class="col2">
            <img src="<?php echo base_url(); ?>assets/images/pet store banner 8 png.png" alt="Pet Image">
            <h2 style="padding-left: 2%">
                Login
            </h2>
            <p style="padding-left: 2%">
                Required information is marked with an asterisk(&#42;).
            </p>
            <form action="" method="post">
                <table>
                    <tr><td>*E-mail:</td><td><input type="text" name="email"></td><td>
                            <span class="error"> <?php echo form_error('email'); ?></span></td></tr>
                    <tr><td>*Password:</td><td><input type="password" name="password"> </td><td>
                            <span class="error"> <?php echo form_error('password'); ?></span></td></tr>
                </table>
                <br>
                <?php
                if(@$data === TRUE)
                    echo "<span style=\"color: #0F0;\">Login successful</span>";
                elseif(@$data === FALSE)
                    echo "<span style=\"color: #F00;\">Username or password incorrect</span>"
                ?>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>