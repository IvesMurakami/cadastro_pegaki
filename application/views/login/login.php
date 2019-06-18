<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
        <script src="<?php echo base_url();?>public/js/jquery-3.3.1.min.js?>"></script>
        <script src="<?php echo base_url();?>public/js/bootstrap.min.js?>"></script>

        <link rel="stylesheet" href="<?php echo base_url();?>public/css/login.css">

    </head>

    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <?= form_open('estabelecimento/index')  ?>
                    <input type="text" id="login" class="fadeIn second form-control" name="login" placeholder="login">
                    <input type="text" id="password" class="fadeIn third  form-control" name="login" placeholder="password">

                    <input type="submit" class="fadeIn fourth" value="LogIn">
                <?= form_close(); ?>
            </div>
        </div>
    </body>
</html>
