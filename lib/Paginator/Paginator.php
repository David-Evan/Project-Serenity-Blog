<?php

 namespace Library\Paginator;

/**
  * @author David EVAN
  * @source http://github.com/David-Evan/paginator
  * @copyright LICENCE M.I.T
  * 
  * Paginator is a generic class used to easing pagination when you need full control of Data and/or UI.
  */

  class Paginator{

    /**
     * URL Pattern used to generate custom url
     */
    const URL_DEFAULT_PAGE_PATTERN = '/{page}/';

    /**
     * Data to paginate. Any array (eg PDO:FETCH_OBJ / PDO:FETCH_ASSOC working well)
     * 
     * @var array
     */
    protected $elementToPaginate;

    /**
     * Page range after/before current page you need to display
     * eg : 1 = [<][...] [c-1] [c] [c+2] [...] [>]
     * eg : 2 = [<][...] [c-2] [c-1] [c] [c+1] [c+2] [...] [>]
     * READ ONLY
     * @var int - default : 2
     */
    protected $paginatorRange = 2;

    /**
     * Number of element per page you want to return
     * READ ONLY
     * @var int - default : 3
     */
    protected $elementsPerPage = 3;

    /**
     * Current page you want to return. If you are over limits, paginator will only return empty array (array([]))
     * If you want to test if the current page is existing, you can use method {::currentPageExist()}
     * READ ONLY
     * @var int - default : 1
     */
    protected $currentPage = 1;

    /**
     * Total page you have in your data array
     * READ ONLY
     * @var int
     */
    protected $totalPage;

    /**
     * Array of previous / next page in paginator. Could be used to display pagination component.
     *
     * Eg 1 :  You have 10 pages. The paginator range is 2. The current page is 5.
     * Result : array([3],[4],[5],[6],[7])
     * Eg 2 :  You have 10 pages. The paginator range is 2. The current page is 1.
     * Result: array([1][2][3])
     *
     * READ ONLY
     * @var array
     */
    protected $pageList = [];

    /**
     * If the next page exist, return page number, else return false
     * You can use {::isCurrentPageLastOne} to have a true/false return.
     * READ ONLY
     * @var mixed (boolean - int)
     */
    protected $nextPage;

    /**
     * If the previous page exist, return page number, else return false
     * You can use {::isCurrentPageFirstOne} to have a true/false return.
     * READ ONLY
     * @var mixed (boolean - int)
     */
    protected $previousPage;


    /**
     * URL Template is used to generate custom URL for each pages.
     * Paginator::URLPagePattern is the pattern to find/replace in your custom URL.
     * Eg : http://www.mycustomwebsite/blog/{page}
     * => : Will be replace by URL generator by : (for the second page)
     *      http://www.mycustomwebsite/blog/2
     * 
     * 
     * To get your URL, you can use method : getURLForPage(x) - getURLForFirstPage() - getURLForNextPage() etc...
     * 
     * If null, url methods will give you back null. You can use strict mode, also, url method will throw an error if you didn't set URL Template.
     * 
     * Get/Set - URL is generated each time you need it. You can change URLTemplate for another one at anytime. (Paginator::SetURLTemplate())
     * @var string 
     */
    protected $URLTemplate = null;

    /**
     * URL Pattern is used to generate custom URL for each pages (use search & replace)
     * 
     * Get/Set - URL is generated each time you need it. You can change URLPattern for another one at anytime. (Paginator::SetURLPattern())
     * default : /{page}/
     * @var Regex
     */
    protected $URLPattern = null;
    
    /**
     * If you enable strict mode : 
     *  - Use URL Generator (getURLxxx methods) without set URLTemplate (or non-existing pattern) will result by an \Exception
     *  - Try to get Elements Data from a non-existing page will result by an \Exception
     *
     * @var boolean
     */
    protected $enableStrictMode = true;

    /**
     * Construct a paginator with your data array and parameters.
     *
     * @param array elementToPaginate - The Data array
     * 
     * Others params : PaginatorOptions object or Array
     * @param int   currentPage - The current page you are
     * @param int   elementPerPage - Number of element per page you want to have
     * @param int   paginatorRange - The range of page you have in your paginator. See property documentation to understand this one.
     * @param string URLTemplate - URL Template for url generation. Use the pattern (defaut : {page}) tu customize your URL
     * @param boolean StrictMode - If true, strict mode will be activated. See @doc to understand strict/non-strict mode
     */
    public function __construct(array $elementToPaginate, $args = null){
        // Set parameters. See method doc to understand.
        $this->setPaginatorParameters($args);

        $this->elementToPaginate = $elementToPaginate;
        
        // Maximum existing page
        $this->totalPage = intval(ceil(count($this->elementToPaginate)/$this->elementsPerPage));

        // True : False depending if exist a page before/after current, else prev/next = page number;
        $this->nextPage = (($this->currentPage+1) > $this->totalPage) ?false:$this->currentPage+1;
        $this->previousPage = (($this->currentPage-1) < 1) ?false:$this->currentPage-1;

        // Get the page list from current page
        $this->buildPageList();
    }

    /**
     * Internal use only
     * Set parameters will convert a PaginatorOption object OR, options array into parameters.
     * It use setXxxx methods to push parameters.
     * Exception will be throwed if incorrect value.
     * 
     * You can use anonyms object, using IPaginatorOption interface or Instance of PaginatorOption to more simplicity.
     * @return void
     */
    protected function setPaginatorParameters($params){
        if($params === null)
            return;

        if(is_array($params) or $params instanceof PaginatorOptions)
        {
            if($params instanceof PaginatorOptions)
                $params = $params->getObjectProperties();

            foreach($params as $paramName => $paramValue){
                $method = 'set'.$paramName;
                $this->{ucfirst($method)}($paramValue);
            }
        }
        else
            throw new \Exception('Invalid Parameters : Params need to be an array or instance of PaginatorOptions');
    }
    
    /**
     * Internal use only.
     * Build the 'page list'. See doc of property. 
     * You can get the result with ::getPageList() method
     * @return array
     */
    protected function buildPageList(){
        for($i = $this->currentPage-$this->paginatorRange;
            $i <= $this->currentPage+$this->paginatorRange;
            $i++)
            {
                if($this->existPage($i))
                    $this->pageList[] = $i;
            }
    }
   
     /**
      * Internal use only.
      * Return a generated url, using URL Template for $page.
      * If page isn't exist, and no check isn't true, generated url will be @return null.
      * If strict mode is used, and no template url is set, it will throw an Error.
      *
      * @param int $page
      * @param boolean $noCheck
      * @return mixed
      */
    protected function generateURLForPage($page, $noCheck = false){
        
        if($this->enableStrictMode && (empty($this->URLTemplate) || !preg_match($this->URLPattern, $this->URLTemplate)))
            throw new \Exception ("PAGINATOR STRICT MODE : You need a valid URL Pattern / Template to use URL Generator");

        if(!is_int($page))
            throw new \Exception('$page in GetURLForPage need to be a integer');

        $URLPattern = ($this->URLPattern !== null) ? $this->URLPattern: self::URL_DEFAULT_PAGE_PATTERN;

        if(($this->existPage($page) || $noCheck === true) && $this->URLTemplate !== null) 
            return preg_replace($URLPattern, $page ,$this->URLTemplate);
        else
            return null;
    }

    /**
     * Return an array of data for the current page.
     * @return array
     */
    public function getElementsForCurrentPage(){
        return $this->getElementsForPage($this->currentPage);
    }

    /**
     * Return an array of data for the specified page.
     * If page didn't exist, return void array
     * @return array
     */
    public function getElementsForPage($page){

        if($this->enableStrictMode && !$this->existPage($page))
            throw new \Exception ("PAGINATOR STRICT MODE : You can't get data from a non-existing page");

        $buffer = $this->elementToPaginate;

        $firstElement = ($page - 1) * $this->elementsPerPage;

        $elementsForCurrentPage = array_splice($buffer, $firstElement, $this->elementsPerPage);
        unset($buffer); // Destroy buffer to limit memory usage

        return $elementsForCurrentPage;
    }

    /**
     * Return true if is exist a page after the current page
     * @return bool
     */
    public function nextPageExist(){
        if($this->nextPage !== false)
            return true;
        return false;
    }

    /**
     * Return true if is exist a page before the current page
     * @return bool
     */
    public function previousPageExist(){
        if($this->previousPage !== false)
            return true;
        return false;
    }

    /**
     * Return true if all page before current is in paginator range, false enougth.
     * @return bool
     */
    public function canAllPageBeforeBeDisplayed(){
        if (($this->currentPage - $this->paginatorRange) <= 1)
            return true;
        return false;
    }

    /**
     * Return true if all page after current is in paginator range, false enougth.
     * @return bool
     */
    public function canAllPageAfterBeDisplayed(){
        if(($this->currentPage + $this->paginatorRange) >= $this->totalPage)
            return true;
        return false;
    }

    /**
     * Return true if the current page exist.
     * @param $page - Page to test if exist
     * @return bool
     */
    public function currentPageExist(){
        return $this->existPage($this->currentPage);
    }

    /**
     * Return true if $page exist between 1 and total page
     * @param $page - Page to test if exist
     * @return bool
     */
    public function existPage($page){
        if($page >= 1 && $page <= $this->totalPage && is_int($page))
            return true;
        return false;
    }

    /**
     * Return true if current page is the first one
     * @return bool
     */
    public function isCurrentPageFirstOne(){
        if($this->currentPage === 1)
            return true;
        return false;
    }

    /**
     * Return true if current page is the first one
     * @return bool
     */
    public function isCurrentPageLastOne(){
        if($this->currentPage === $this->totalPage)
            return true;
        return false;
    }

    /**
     * Return a generated url for page X.
     * If page didn't exist, return false or, if @param $noCheck is true, give back url
     * If strict mode isn't used, and urltemplate isn't set, return null
     * If stict mode is used, and urltemplate isn't set, throw an Exception.
     * 
     * @param int $page
     * @param boolean $noCheck - If true, you will get your page URL even if isn't exist
     */
    public function getURLForPage($page, $noCheck = false){
        return $this->generateURLForPage($page, $noCheck);
    }   

    /**
     * Shorcut to get URL For the first page.
     * doc at paginator::getURLForPage(x)
     * @return string
     */
    public function getURLForFirstPage(){
        return $this->getURLForPage(1);
    }

    /**
     * Shorcut to get URL For the last page.
     * doc at paginator::getURLForPage(x)
     * @return string
     */
    public function getURLForLastPage(){
        return $this->getURLForPage($this->totalPage);
    }

    /**
     * Shorcut to get URL For the next page.
     * doc at paginator::getURLForPage(x)
     * @return string
     */
    public function getURLForNextPage(){
        if($this->nextPageExist())
            return $this->getURLForPage($this->nextPage);
        else
            return null;
    }

    /**
     * Shorcut to get URL For the previous page.
     * doc at paginator::getURLForPage(x)
     * @return string
     */
    public function getURLForPreviousPage(){
        if($this->previousPageExist())
            return $this->getURLForPage($this->previousPage);
        else 
            return null;
    }


    /**** Getter ****/
    public function getElementToPaginate(){
        return $this->elementToPaginate;
    }

    public function getPaginatorRange(){
        return $this->paginatorRange;
    }

    public function getElementsPerPage(){
        return $this->elementsPerPage;
    }

    public function getCurrentPage(){
        return $this->currentPage;
    }

    public function getTotalPage(){
        return $this->totalPage;
    }

    public function getPageList(){
        return $this->pageList;
    }

    public function getNextPage(){
        return $this->nextPage;
    }

    public function getPreviousPage(){
        return $this->previousPage;
    }

    public function getURLPattern(){
        return $this->URLPattern;
    }

    public function getURLTemplate(){
        return $this->URLTemplate;
    }

    /**
     * Alias for getTotalPage();
     */
    public function getLastPage(){
        return $this->totalPage;
    }

    /**** Setter ****/
    protected function setPaginatorRange($paginatorRange){
        if(is_int($paginatorRange))
            $this->paginatorRange = $paginatorRange;
        else
            throw new \Exception('paginatorRange need to be an integer');
    }

    protected function setElementsPerPage($elementsPerPage){
        if(is_int($elementsPerPage))
            $this->elementsPerPage = $elementsPerPage;
        else
            throw new \Exception('elementPerPage need to be an integer');
    }

    protected function setCurrentPage($currentPage){
        if(is_int($currentPage))
            $this->currentPage = $currentPage;
        else
            throw new \Exception('currentPage need to be an integer');
    }

    protected function setEnableStrictMode($enableStrictMode){
        if(is_bool($enableStrictMode))
            $this->enableStrictMode = $enableStrictMode;
        else
            throw new \Exception('enableStrictMode need to be a boolean');
    }


    /***** Public Setters *****/
    public function setURLTemplate($URLTemplate){
        if(is_string($URLTemplate))
            $this->URLTemplate = $URLTemplate;
        else
            throw new \Exception('URLTemplate need to be a string');
    }

    public function setURLPattern($URLPattern){
        if(is_string($URLPattern))
            $this->URLPattern = $URLPattern;
        else
            throw new \Exception('URLPattern need to be a string');
    }

}
