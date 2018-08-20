<?php

namespace Model\Entity;

use Library\Entity;

class Comment extends Entity{

	const CONTENT_MIN_SIZE = 5;
	const CONTENT_MAX_SIZE = 1500;
	const AUTHOR_NAME_MIN_SIZE = 3;

	const DEFAULT_STATUS = 'published';

    /**
     * authorName
     * @var string
     */
    protected $postID;

    /**
     * title
     * @var string
     */
    protected $authorEmail;
    
    /**
     * content
     * @var string
     */              
    protected $authorName;
    
    /**
     * publishDate
     * @var Date
     */
    protected $content;

    /**
     * ReadOnly
     * updateDate - Auto adjust when use UPDATE SQL
     * @var Date
     */
    protected $publishDate;

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
    protected $isUnderSurvey;
    
    /**
     * pictureURL - Illustration blog picture url.
     * @var string
     */
    protected $surveyCount;


	/**
	 * Check properties before add or update
	 */
	public function isValidEntity(){

		if(!filter_var($this->postID, FILTER_VALIDATE_INT))
			return false;
			
		if(!filter_var($this->authorEmail, FILTER_VALIDATE_EMAIL))
			return false;

		if(strlen($this->authorName) < self::AUTHOR_NAME_MIN_SIZE)
			return false;

		if(strlen($this->content) < self::CONTENT_MIN_SIZE && strlen($this) > self::CONTENT_MAX_SIZE)
			return false;

		return true;

	}

    /** Getter/Setter **/
    public function getPostID(){
		return $this->postID;
	}

	public function setPostID($postID){
		$this->postID = $postID;
	}

	public function getAuthorEmail(){
		return $this->authorEmail;
	}

	public function setAuthorEmail($authorEmail){
		$this->authorEmail = $authorEmail;
	}

	public function getAuthorName(){
		return $this->authorName;
	}

	public function setAuthorName($authorName){
		$this->authorName = $authorName;
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

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getIsUnderSurvey(){
		return $this->isUnderSurvey;
	}

	public function setIsUnderSurvey($isUnderSurvey){
		$this->isUnderSurvey = $isUnderSurvey;
	}

	public function getSurveyCount(){
		return $this->surveyCount;
	}

	public function setSurveyCount($surveyCount){
		$this->surveyCount = $surveyCount;
	}
}