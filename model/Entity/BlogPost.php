<?php

namespace Model\Entity;

use Library\Entity;

class BlogPost extends Entity{

    /**
     * authorName
     * @var string
     */
    protected $authorName;

    /**
     * title
     * @var string
     */
    protected $title;
    
    /**
     * content
     * @var string
     */              
    protected $content;
    
    /**
     * publishDate
     * @var Date
     */
    protected $publishDate;

    /**
     * ReadOnly
     * updateDate - Auto adjust when use UPDATE SQL
     * @var Date
     */
    protected $updateDate;

    /**
     * status - Status of post. Could be :
     * { 'published' - 'draft' - 'archived'}
     * @var string
     */
    protected $status;
    
    /**
     * slug - Slugified title
     * @var string
     */
    protected $slug;
    
    /**
     * pictureURL - Illustration blog picture url.
     * @var string
     */
    protected $pictureURL;


    /** Getter/Setter **/
    public function getAuthorName(){
        return $this->authorName;
    }

    public function setAuthorName($authorName){
        $this->authorName = $authorName;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getPublishDate(){
        return $this->publishDate;
    }

    public function setPublishDate($publishDate){
        $this->publishDate = $publishDate;
    }

    public function getUpdateDate(){
        return $this->updateDate;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function setSlug($slug){
        $this->slug = $slug;
    }

    public function getPictureURL(){
        return $this->pictureURL;
    }

    public function setPictureURL($pictureURL){
        $this->pictureURL = $pictureURL;
    }

}