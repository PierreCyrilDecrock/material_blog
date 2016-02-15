<?php
namespace BlogBundle;
class Comment
{


  private $content;
  private $author;
  private $publishedAt;

  public function __construct($content, $author, $publishedAt)
  {

      $this->content = $content;
      $this->author = $author;
      $this->publishedAt = $publishedAt;
  }

    /**
     * Get the value of author
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the value of content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the value of publishedAt
     *
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

}
