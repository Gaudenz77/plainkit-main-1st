<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<!-- <script src="./blockchain.js" defer></script> -->
<script src="https://kit.fontawesome.com/d4cbcb96c8.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <?= js('assets/js/blockchain.js') ?>
    <?= css('assets/css/styles.css') ?>
    <title><?= $site->title()?></title>
    
</head>

<body class="mt-0">
<header class="header m-12 mt-8">
<div>
    <a href="<?= $site->url() ?>" class="midLogo"><?= $site->title() ?></a>

    <div class=" text-center">
        <i class="fa-brands fa-bitcoin fa-8x fa-spin" style="--fa-animation-duration: 5s;"></i>    
    </div>
    

    <div class="flex md:flex-grow justify-end space-x-1">
        <?php foreach ($site->children()->listed() as $item): ?>
            <a class="py-4 px-2 text-gray-500 font-semibold hover:text-teal-300 transition duration-300" href="<?= $item->url() ?>">
                <?= $item->title() ?>
            </a>
        <?php endforeach; ?>
    </div>
    </div>

</header>


    <!-- Main Container -->
    <div class="container mx-auto">
        <div class="text-center">
            <h1 class="text-4xl font-bold"><?= $page->title() ?></h1>
            <p><?= $page->text() ?></p>
        </div>

        <!-- Blockchain Section (conditionally included) -->
        <div class="flex justify-center">
            <?php if ($page->slug() === 'secondpage'): ?>
                <?php snippet('blockchain'); ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>