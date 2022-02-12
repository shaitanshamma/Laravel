<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;
use App\Models\Category;
use App\Models\News;
use Laravie\Parser\Document;

class NewsParserService implements Parser
{
    /**
     * @var Document
     */
    private Document $document;
    protected string $fileName;

    /**
     * @param string $link
     * @return Parser
     */
    public function setLink(string $link): Parser
    {
        $this->document = \XmlParser::load($link);
        $this->fileName = $link;
        return $this;
    }

    /**
     * @return void
     */
    public function parse(): void
    {
        $data = $this->document->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        $category = Category::query()->where('title', $data['title'])->first();


        if (!$category) {
            $category = new Category();
            $category->title = $data['title'];
            $category->save();
        }

        foreach ($data['news'] as $item) {

            $news = new News();

            $news->title = $item['title'];
            $news->source = $item['link'];
            $news->description = $item['description'];
            $news->created_at = $item['pubDate'];
            $news->save();
            $news->category()->attach($category->id);

        }

    }
}
