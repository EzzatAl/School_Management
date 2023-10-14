<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/cs.css">
    <title>LogIn</title>
</head>
<body>
    <div id="warp">
        For A Better Future
        <form method="POST" action="<?php echo e(route('login')); ?>" id="formu">
            <?php echo csrf_field(); ?>
                <div class="admin">
                          <div class="rota">
                                <h1>School</h1>
                                <input id="first_name" type="text" name="first_name" value="" placeholder="first_name"/><br/>
                                <input id="password" type="password" name="password" value="" placeholder="Password"/>
                          </div>
                    </div>
                    <div class="cms">
                          <div class="roti">
                                <h1>LogIN</h1>
                                <button id="valid" type="submit" name="valid">Valid</button><br/>
              </div>
                    </div>
              </form>
        </div>
</body>
    <script src="js/js.js"></script>
</html>
<?php /**PATH D:\EZZT SVU\SVU\F22\PR1\project\Junior_project\resources\views/login.blade.php ENDPATH**/ ?>