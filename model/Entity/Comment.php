<?php

namespace Model\Entity;

use Library\Entity;

class Comment extends Entity{

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