<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
    require __DIR__ . "/../vendor/autoload.php";

    $op = new \KitsuneCode\Optimizer\Optimizer();
    echo $op
        ->optimize(
            "Optimizer Happy and @KitsuneCode",
            "Is a compact and easy-to-use tag creator to optimize your site",
            "https://www.kitsunews.com/kitsunecode/optimizer/example/",
            "https://www.kitsunews.com/uploads/images/2021/08/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.jpg"
        )
        ->openGraph(
            "kitsunews",
            "pt_BR",
            "website"
        )
        ->twitterCard(
            "kitsunews.com",
            "summary_large_image"
        )
        ->publisher(
            "kitsune",
            "enossantana"
        )
        ->facebook(pages:"kitsune")
        // ->facebook(null,null, ["626590460695980", "626590460695981"])//->facebook(null, [9283729732123, 912837192372, 73642734723])
        ->render();
    ?>
</head>
<body>

<h1><?= $op->title; ?></h1>
<p><?= $op->description; ?></p>

<?php
echo "<pre>", print_r($op->data(), true), "</pre>";
echo "<pre>", print_r(array_map("htmlspecialchars", $op->debug()), true), "</pre>";
?>

</body>
</html>