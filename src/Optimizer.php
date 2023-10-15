<?php

namespace KitsuneCode\Optimizer;

/**
 * Class KitsuneCode Optimizer
 *
 * @author Enos S. S. Silva <https://github.com/enosfox>
 * @package KitsuneCode\Optimizer
 */
class Optimizer extends MetaTags
{
    /**
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string $image
     * @param bool $follow
     * @return Optimizer
     */
    public function optimize(
        string $title,
        string $description,
        string $url,
        string $image,
        bool $follow = true,
        bool $article = false,
        ?string $keywords = null,
        ?string $publishedTime = null,
        ?string $modifiedTime = null,
        string $timezone = "America/Sao_Paulo",
        ?string $author = null,
        ?string $organization = null,
        ?string $logo = null
    ): Optimizer {
        $this->data($title, $description, $url, $image);

        $title = $this->filter($title);
        $description = $this->filter($description);

        $this->buildTag("title", $title);
        $this->buildMeta("name", ["description" => $description]);
        $this->buildMeta("name", ["keywords" => $keywords]);
        $this->buildMeta("name", ["robots" => ($follow ? "index, follow" : "noindex, nofollow")]);
        $this->buildLink("canonical", $url);
        $this->buildScript([
            "title" => $title, 
            "image" => $image,
            "description" => $description,
            "url" => $url,
            "article" => $article,
            "publishedTime" => $publishedTime,
            "modifiedTime" => $modifiedTime,
            "timezone" => $timezone,
            "author" => $author,
            "organization" => $organization,
            "logo" => $logo
        ]);

        foreach ($this->tags as $meta => $prefix) {
            $this->buildMeta(
                $meta,
                [
                    "{$prefix}:title" => $title,
                    "{$prefix}:description" => $description,
                    "{$prefix}:url" => $url,
                    "{$prefix}:image" => $image
                ]
            );
        }

        $this->buildMeta(
            "itemprop",
            [
                "name" => $title,
                "description" => $description,
                "url" => $url,
                "image" => $image
            ]
        );

        if($publishedTime){
            date_default_timezone_set($timezone);
            $this->buildMeta("property", [
                "article:published_time" => date(DATE_ATOM, strtotime($publishedTime)),
                "article:modified_time" => date(DATE_ATOM, strtotime($modifiedTime ?? $publishedTime))
            ]);
        }

        return $this;
    }

    /**
     * @param string $fbPage
     * @param string|null $fbAuthor
     * @return Optimizer
     */
    public function publisher(string $fbPage, string $fbAuthor = null): Optimizer
    {
        $this->buildMeta("property", [
            "article:publisher" => "https://www.facebook.com/{$fbPage}"
        ]);

        if ($fbAuthor) {
            $this->buildMeta("property", [
                "article:author" => "https://www.facebook.com/{$fbAuthor}"
            ]);
        }

        return $this;
    }

    /**
     * @param string $siteName
     * @param string $locale
     * @param string $schema
     * @return Optimizer
     */
    public function openGraph(string $siteName, string $locale = "pt_BR", string $schema = "article"): Optimizer
    {
        $prefix = "og";
        $siteName = $this->filter($siteName);

        $this->buildMeta("property", [
            "{$prefix}:type" => $schema,
            "{$prefix}:site_name" => $siteName,
            "{$prefix}:locale" => $locale,
            "{$prefix}:image:width" => 1200
        ]);

        return $this;
    }

    /**
     * @param string $creator
     * @param string $site
     * @param string $domain
     * @param string|null $card
     * @return Optimizer
     */
    public function twitterCard(string $site = null,string $card = null): Optimizer
    {
        $prefix = "twitter";
        $card = ($card ?? "summary_large_image");

        $this->buildMeta("name", [
            "{$prefix}:card" => $card,
            "{$prefix}:site" => $site
        ]);

        return $this;
    }

    /**
     * Você deve usar UM ou OUTRO, se for usar $appid deixe o $admins em null.
     * Mas se for usar $admins, então deixe o $appid em null.
     * @param string|null $appId
     * @param array|null $admins
     * @return Optimizer
     */
    public function facebook(string $appId = null, string $pages = null, array $admins = null): Optimizer
    {
        if ($appId) {
            $fb = $this->meta->addChild("meta");
            $fb->addAttribute("property", "fb:app_id");
            $fb->addAttribute("content", $appId);
            return $this;
        }

        if ($pages) {
            $fb = $this->meta->addChild("meta");
            $fb->addAttribute("property", "fb:pages");
            $fb->addAttribute("content", $pages);
            return $this;
        }

        if (!empty($admins) && is_array($admins)) {
            foreach ($admins as $admin) {
                $fb = $this->meta->addChild("meta");
                $fb->addAttribute("property", "fb:admins");
                $fb->addAttribute("content", $admin);
            }
        }

        return $this;
    }
}