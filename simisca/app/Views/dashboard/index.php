<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    d($_SESSION);
    ?>

    <button onclick="logout()">logout</button>
</body>
<script></script>
<script>
    function logout() {
        location.replace('auth/logout')
    }
</script>

</html>