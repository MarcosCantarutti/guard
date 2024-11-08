<!DOCTYPE html>
<html lang="en" data-theme="dracula" class="bg-zinc-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.css" rel="stylesheet" type="text/css" />

    <title>Guard</title>
</head>

<body>
    <div class="mx-auto max-w-screen-lg h-screen flex flex-col space-y-6 ">
        <?php require base_path('views/partials/_navbar.view.php'); ?>

        <?php require base_path('views/partials/_mensagem.view.php'); ?>



        <div class="bg-zinc-700 rounded flex flex-col p-10">
            <?php require base_path("views/{$view}.view.php"); ?>
        </div>
    </div>

</body>

</html>