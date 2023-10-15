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
    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="admin">
            <div class="rota">
                <h1>School</h1>
                <input type="text" name="full_name" placeholder="Name_Id" required><br/>
                <input type="password" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="cms">
            <div class="roti">
                <h1>LogIN</h1>
                <button type="submit">LogIn</button><br/>
            </div>
        </div>
    </form>
</div>
</body>
<script src="js/js.js"></script>
</html>
<?php /**PATH C:\Users\hp\Project\Junior_project3\Junior_project\resources\views/login.blade.php ENDPATH**/ ?>