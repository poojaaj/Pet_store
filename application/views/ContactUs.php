<div id="wrapper">
    <header>
        <h1> Pet Store </h1>
    </header>
    <div class="container">
        <?php include_once "menu.php" ?>
        <div class="col2">
            <img src="<?php echo base_url(); ?>assets/images/pet store banner 7 png.png" alt="Pet Image">
            <h2 style="padding-left: 2%"> Contact Us</h2>
            <p style="padding-left: 2%">
                Required information is marked with an asterisk(&#42;).
            </p>
            <form method="post" action="">
                <table>
                    <tr><td>*First Name:</td><td><input type="text" name="f_name" ></td><td><span class="error"> <?php echo form_error('f_name'); ?></span></td></tr>
                    <tr><td>*Last Name:</td><td><input type="text" name="l_name" > </td><td><span class="error"> <?php echo form_error('l_name'); ?></span></td></tr>
                    <tr><td>*E-mail:</td><td><input type="text" name="email" ></td><td><span class="error"> <?php echo form_error('email'); ?></span></td></tr>
                    <tr><td>Phone:</td><td><input type="text" name="phone" > </td></tr>
                    <tr><td>*Comments:</td><td><textarea name="comments"></textarea></td><td><span class="error"> <?php echo form_error('comments'); ?></span></td></tr>
                </table>
                <br>
                <?php
                if(isset($data)){
                    echo "<span style=\"color: #0F0;\">Feedback submitted and emailed to admin</span>";
                }
                ?>
                <br>
                <input type="submit" value="Submit" />
            </form>

        </div>
    </div>
</div>