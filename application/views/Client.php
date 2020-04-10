<div id="wrapper">
    <header>
        <h1> Pet Store </h1>
    </header>
    <div class="container">
        <?php include_once "menu.php" ?>
        <div class="col2">
            <img src="<?php echo base_url(); ?>assets/images/pet store banner 8 png.png" alt="Pet Image">
            <h2 style="padding-left: 2%">
                My Pet
            </h2>
            <p style="padding-left: 2%">
                Required information is marked with an asterisk(&#42;).
            </p>
            <form action="" method="POST" action="" >

                <table>
                    <tr><td>*First Name:</td><td><input type="text" name="f_name" ></td><td>
                            <span class="error"> <?php echo form_error('f_name'); ?></span></td></tr>

                    <tr><td>*Last Name:</td><td><input type="text" name="l_name" ></td><td>
                            <span class="error"> <?php echo form_error('l_name'); ?></span></td></tr></td></tr>

                    <tr><td>*E-mail:</td><td><input type="text" name="email" id="email" ></td><td>
                            <span class="error"><?php echo form_error('email'); ?></span></td></tr>

                    <tr><td>&nbsp;Phone:</td><td><input type="text" name="phone" ></td><td>
                            <span class="error"><?php echo form_error('phone'); ?></span> </td></tr>

                    <tr><td>&nbsp;Business Name:</td><td><input type="text" name="business"> </td></tr>
                </table>
                <br>
                <?php
                switch(@$data){
                    case 1:
                        echo "<span style=\"color: #F00;\">Email already exists. User another email.</span>";
                        break;
                    case 2:
                        echo "<span style=\"color: #0F0;\">Client inserted. Email mailed to registered email.</span>";
                        break;
                    case 3:
                        echo "<span style=\"color: #F00;\">Error sending mail. Temp password is 123456</span>";
                        break;
                    case 4:
                        echo "<span style=\"color: #F00;\">Failed to insert client</span>";
                        break;
                    case 5;
                        echo "<span style=\"color: #F00;\">Failed to insert User</span>";
                        break;
                    case 6:
                        echo "<span style=\"color: #F00;\">Error connecting to database</span>";
                        break;
                    default:
                        echo "";
                        break;

                }
                ?>
                <span style="color: #F00;" id="errorEmail"></span>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
