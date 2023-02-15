<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
    require __DIR__ . "/../vendor/autoload.php";

    $op = new \KitsuneCode\Optimizer\Optimizer();
    echo $op->optimize(
            title: "Optimizer Happy and @KitsuneCode",
            description: "Is a compact and easy-to-use tag creator to optimize your site",
            url: "https://kitsunewsys.com/kitsunecode/optimizer/example/",
            image: "https://kitsunewsys.com/uploads/images/2023/02/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.webp",
            //follow: true, //opcional - lembrando que utilizando os nomes de parametro não precisa ser declarado
                            //optional - remembering that using the parameter names does not need to be declared
            publishedTime: "25-12-2022 13:40:58", //opcional - optional
            modifiedTime: "15-02-2023", //opcional - optional
            // timezone: 'UTC' //padrão America/Sao_paulo
                                //standart America/Sao_paulo
            author: "Jonh Joe",
            organization: 'Kitsune Web System',
            logo: 'https://kitsunewsys.com/uploads/images/2023/02/exemplo-de-logotipo.webp'
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