<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if (isset($token)) : ?>
        <iframe src="http://localhost/limesurvey/index.php/423492?token=<?= $token; ?>" frameborder="0" width="100%" height="500px"></iframe>
    <?php else : ?>
        <h1>Anda Tidak Terdaftar dalam Survei Ini</h1>
    <?php endif; ?>
</body>

</html>