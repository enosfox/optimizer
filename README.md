# Optimizer @KitsuneCode

###### Optimizer is a component of website optimization for search engines and social networks. Simplified and straight to the point it creates the necessary tags and links in your ***head*** for the best search and sharing result.

Optimizer é um componente de otimização de sites para motores de buscas e redes sociais. Simplificado e direto ao ponto ele cria as tags e links necessários em sua ***head*** para o melhor resultado de busca e compartilhamento.

## About KitsuneCode

###### KitsuneCode is a set of small and optimized PHP components for common tasks. Held by Enos S. S. Silva and the Kitsune team. With them you perform routine tasks with fewer lines, writing less and doing much more.

KitsuneCode é um conjunto de pequenos e otimizados componentes PHP para tarefas comuns. Mantido por Enos S. S. Silva e a equipe Kitsune. Com eles você executa tarefas rotineiras com poucas linhas, escrevendo menos e fazendo muito mais.

### Highlights

- Simple composer for dynamic data (Compositor simples para dados dinâmicos)
- Author and publisher settings for Facebook (Configuração de autor e publicador para Facebook)
- Quickly configure TwitterCard data for sharing cards (Configure rapidamente os dados TwitterCard para cartões de compartilhamento)
- Quickly configure OpenGraph data for social sharing. (Configure rapidamente os dados OpenGraph para compartilhamento social.)
- Add FacebookAdmins or FacebookAppId and everything is ready (Adiciona FacebookAdmins ou FacebookAppId e tudo fica pronto)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Optimizer is available via Composer:

```bash
"kitsunecode/optimizer": "1.0.*"
```

or run

```bash
composer require kitsunecode/optimizer
```

## Documentation

###### For details on how to use the optimizer, see the sample folder with details in the component directory

Para mais detalhes sobre como usar o optimizer, veja a pasta de exemplo com detalhes no diretório do componente

#### @optimize

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

$op = new \KitsuneCode\Optimizer\Optimizer();

echo $op->optimize(
        title: "Optimizer Happy and @KitsuneCode",
        description: "Is a compact and easy-to-use tag creator to optimize your site",
        url: "https://kitsunewsys.com/kitsunecode/optimizer/example/",
        image: "https://kitsunewsys.com/uploads/images/2021/08/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.jpg",
        //follow: true, //opcional - lembrando que utilizando os nomes de parametro não precisa ser declarado
        article: true,
                        //optional - remembering that using the parameter names does not need to be declared
        publishedTime: "25-12-2022 13:40:58", //opcional - optional
        modifiedTime: "15-02-2023", //opcional - optional
        // timezone: 'UTC' //padrão America/Sao_paulo
                            //standart America/Sao_paulo
        author: "Jonh Joe",
        organization: 'Kitsune Web System',
        logo: 'https://kitsunewsys.com/uploads/images/2023/02/exemplo-de-logotipo.webp'
)->render();
```

##### Result @optimize

````html
<title>Optimizer Happy and @KitsuneCode</title>
<script type="application/ld+json">{
    "@context": "http://schema.org/",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://kitsunewsys.com/kitsunecode/optimizer/example/"
    },
    "author": {
        "@type": "Person",
        "name": "Jonh Joe"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Kitsune Web System",
        "logo": {
            "@type": "ImageObject",
            "url": "https://kitsunewsys.com/uploads/images/2023/02/exemplo-de-logotipo.webp"
        }
    },
    "headline": "Optimizer Happy and @KitsuneCode",
    "image": "https://kitsunewsys.com/uploads/images/2023/02/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.webp",
    "datePublished": "2022-12-25T13:40:58-03:00",
    "dateModified": "2023-02-15T00:00:00-03:00",
    "description": "Is a compact and easy-to-use tag creator to optimize your site"
  }
</script>
<meta property="og:url" content="https://kitsunewsys.com/kitsunecode/optimizer/example/"/>
<meta property="og:title" content="Optimizer Happy and @KitsuneCode"/>
<meta property="og:image" content="https://kitsunewsys.com/uploads/images/2021/08/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.jpg"/>
<meta property="og:description" content="Is a compact and easy-to-use tag creator to optimize your site"/>
<meta property="article:published_time" content="2022-12-25T13:40:58-03:00"/>
<meta property="article:modified_time" content="2023-02-15T00:00:00-03:00"/>
<meta name="twitter:url" content="https://kitsunewsys.com/kitsunecode/optimizer/example/"/>
<meta name="twitter:title" content="Optimizer Happy and @KitsuneCode"/>
<meta name="twitter:image" content="https://kitsunewsys.com/uploads/images/2021/08/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.jpg"/>
<meta name="twitter:description" content="Is a compact and easy-to-use tag creator to optimize your site"/>
<meta name="robots" content="index, follow"/>
<meta name="description" content="Is a compact and easy-to-use tag creator to optimize your site"/>
<meta itemprop="url" content="https://kitsunewsys.com/kitsunecode/optimizer/example/"/>
<meta itemprop="name" content="Optimizer Happy and @KitsuneCode"/>
<meta itemprop="image" content="https://kitsunewsys.com/uploads/images/2021/08/exemplo-de-imagem-carregada-pra-compartilhamento-1511276983.jpg"/>
<meta itemprop="description" content="Is a compact and easy-to-use tag creator to optimize your site"/>
<link rel="canonical" href="https://kitsunewsys.com/kitsunecode/optimizer/example/"/>
````

#### @publisher

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

$op = new \KitsuneCode\Optimizer\Optimizer();

echo $op->publisher(
  "kitsune",
  "enossantana"
)->render();
```

##### Result @publisher

````html
<meta property="article:publisher" content="https://www.facebook.com/kitsune"/>
<meta property="article:author" content="https://www.facebook.com/enossantana"/>
````

#### @twitterCard

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

$op = new \KitsuneCode\Optimizer\Optimizer();

echo $op->twitterCard(
  "kitsunews",
  "@enoswmaster",
  "kitsunewsys.com",
  "summary_large_image"
)->render();
```

##### Result @twitterCard

````html
<meta name="twitter:site" content="kitsunews"/>
<meta name="twitter:domain" content="kitsunewsys.com"/>
<meta name="twitter:creator" content="@enoswmaster"/>
<meta name="twitter:card" content="summary_large_image"/>
````

#### @openGraph

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

$op = new \CoffeeCode\Optimizer\Optimizer();

echo $op->openGraph(
  "kitsune",
  "pt_BR",
  "article"
)->render();
```

##### Result @openGraph

````html
<meta property="og:type" content="article"/>
<meta property="og:site_name" content="kitsune"/>
<meta property="og:locale" content="pt_BR"/>
````

## Support

###### Security: If you discover any security related issues, please email devenos@icloud.com instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para devenos@icloud.com em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Enos S. S. Silva](https://github.com/enosfox) (Developer)

## License

The MIT License (MIT). Please see [License File](https://github.com/enosfox/optimizer/blob/master/LICENSE) for more information.
