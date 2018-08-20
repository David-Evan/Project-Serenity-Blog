<?php

namespace Model;
use Library\Entity;

class BlogPost extends Entity{

    /**
     * authorName
     * @var string
     */
    protected $_authorName;

    /**
     * title
     * @var string
     */
    protected $_title;
    
    /**
     * content
     * @var string
     */              
    protected $_content;
    
    /**
     * publishDate
     * @var Date
     */
    protected $_publishDate;

    /**
     * ReadOnly
     * updateDate - Auto adjust when use UPDATE SQL
     * @var Date
     */
    protected $_updateDate;

    /**
     * status - Status of post. Could be :
     * { 'published' - 'draft' - 'archived'}
     * @var string
     */
    protected $_status;
    
    /**
     * slug - Slugified title
     * @var string
     */
    protected $_slug;
    
    /**
     * pictureURL - Illustration blog picture url.
     * @var string
     */
    protected $_pictureURL;


    /** Getter/Setter **/
    public function get_authorName(){
        return $this->_authorName;
    }

    public function set_authorName($authorName){
        $this->_authorName = $authorName;
    }

    public function get_title(){
        return $this->_title;
    }

    public function set_title($title){
        $this->_title = $title;
    }

    public function get_content(){
        return $this->_content;
    }

    public function set_content($content){
        $this->_content = $content;
    }

    public function get_publishDate(){
        return $this->_publishDate;
    }

    public function set_publishDate($publishDate){
        $this->_publishDate = $publishDate;
    }

    public function get_updateDate(){
        return $this->_updateDate;
    }

    public function get_status(){
        return $this->_status;
    }

    public function set_status($status){
        $this->_status = $status;
    }

    public function get_slug(){
        return $this->_slug;
    }

    public function set_slug($slug){
        $this->_slug = $slug;
    }

    public function get_pictureURL(){
        return $this->_pictureURL;
    }

    public function set_pictureURL($pictureURL){
        $this->_pictureURL = $pictureURL;
    }

}