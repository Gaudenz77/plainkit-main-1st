<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<!-- <script src="./blockchain.js" defer></script> -->
    
    <?= css('assets/js/blockchain.js') ?>
    <?= css('assets/css/styles.css') ?>
    <title><?= $site->title()?></title>
    
</head>
    <body class="m-24">
    <!-- <div class="container bg-indigo-200 max-w-screen-lg mx-auto">

            <div class="flex mx-auto gap-12 justify-center">
                <div class="bg-orange-600 p-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus non consectetur laborum reprehenderit maxime magnam quam reiciendis quas. Sint mollitia nostrum eius? Eius ipsa nobis rem ea aut suscipit aliquam.</div>
                <div class="bg-emerald-600 p-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, quod consequatur. Mollitia magni ullam adipisci, soluta nostrum harum vero atque esse, rem iusto consequuntur debitis! Voluptatem enim magni numquam in.</div>
                <div class="bg-pink-600 p-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, quod consequatur. Mollitia magni ullam adipisci, soluta nostrum harum vero atque esse, rem iusto consequuntur debitis! Voluptatem enim magni numquam in.</div>  
            </div>
            
        </div> -->
        <header class="header">
            <a href="<?= $site->url() ?>" class="logo"><?= $site->title() ?></a>

            <div class="flex md:flex md:flex-grow flex-row-reverse space-x-1">
                
                    <!-- <li><a href="">Home</a></li>
                    <li><a href="">Home</a></li> -->
                    <?php foreach ($site->children()->listed() as $item ):  ?>
                    <a class="py-4 px-2 text-gray-500 font-semibold hover:text-teal-300 transition duration-300" href="<?= $item->url() ?>"><?= $item->title() ?></a>
                    <?php endforeach; ?>
                
            </div>
        </header>
     <h1 class=""><i class="fa-solid fa-face-grin-tongue-wink fa-5x fa-spin p-12 text-orange-300"></i> <?= $page->title() ?></h1>
     <?= $page->text() ?>
     <?php snippet('blockchain'); ?>
    </body>
</html>
