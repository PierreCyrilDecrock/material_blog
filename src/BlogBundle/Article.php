<?php
namespace BlogBundle;
class Article
{

    private $title;
    private $summary;
    private $content;
    private $author;
    private $publishedAt;
    private $category;
    private $tags;

    public function __construct($title, $summary, $content, $author, $publishedAt, $category, $tags)
    {
        $this->title = $title;
        $this->summary = $summary;
        $this->content = $content;
        $this->author = $author;
        $this->publishedAt = $publishedAt;
        $this->category = $category;
        $this->tags = $tags;
    }
    /**
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Get the value of Summary
     *
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }
    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Get the value of Author
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Get the value of PublishedAt
     *
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
    /**
     * Get the value of Category
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Get the value of Tags
     *
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

}
