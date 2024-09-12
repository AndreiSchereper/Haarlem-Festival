<?php

// page is a table in db that holds dynamic page info
class Page implements JsonSerializable{
    private int $id; // id is primary key
    private string $URI; // url of the page
    private string $title; // title of the page
    private string $bodyContentHTML; // content of the page which is in html and is created by tinyMCE
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getURI(): string
    {
        return $this->URI;
    }
    /**
     * @param string $URI
     */
    public function setURI(string $URI): void
    {
        $this->URI = $URI;
    }
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getBodyContentHTML(): string
    {
        return $this->bodyContentHTML;
    }
    /**
     * @param string $bodyContentHTML
     */
    public function setBodyContentHTML(string $bodyContentHTML): void
    {
        $this->bodyContentHTML = $bodyContentHTML;
    }
}