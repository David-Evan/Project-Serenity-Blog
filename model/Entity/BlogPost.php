<?php

namespace Model\Entity;

use Library\Entity;

class BlogPost extends Entity{

    const TITLE_MIN_SIZE = 3;
    const TITLE_MAX_SIZE = 200;

    const CONTENT_MIN_SIZE = 5;
    const CONTENT_MAX_SIZE = 15000;
    
    const PUBLISHED_STATUS = 'published';
    const DRAFT_STATUS = 'draft';

    const AUTHOR_NAME = 'Jean FORTEROCHE';
    
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


    /**
	 * Check properties before add or update
	 */
	public function isValidEntity(){

        if(strlen($this->title) < self::TITLE_MIN_SIZE && strlen($this->title) > self::TITLE_MAX_SIZE)
            return false;
            
        if(strlen($this->content) < self::CONTENT_MIN_SIZE && strlen($this->content) > self::CONTENT_MAX_SIZE)
            return false;
            
        if($this->status != self::PUBLISHED_STATUS && $this->status != self::DRAFT_STATUS)
            return false;
            
        if(!filter_var($this->pictureURL, FILTER_VALIDATE_URL) && !empty($this->pictureURL))
            return false;

		return true;

    }

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
        $this->status = ($status == 1) ? self::PUBLISHED_STATUS : (($status == 0) ? self::DRAFT_STATUS : 'none');
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