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
            <form>
                <table>
                    <tr><td>Client name:</td><td><input type="text" name="client" ></td></tr>
                    <tr><td>*My Pet:</td><td><input type="text" name="service" required> </td></tr>
                </table>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
