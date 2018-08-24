<?php

 namespace Library;

/**
  * @author David EVAN
  * @source http://github.com/David-Evan/paginator
  * @copyright LICENCE M.I.T
  * 
  * Paginator is a generic class used to easing pagination when you need full control of Data and/or UI.
  */

  class Paginator{

    /**
     * Data to paginate. Any array (eg PDO:FETCH_OBJ / PDO:FETCH_ASSOC working well)
     * @var array
     */
    protected $elementToPaginate;

    /**
     * Page range after/before current page you need to display
     * eg : 1 = [<][...] [c-1] [c] [c+2] [...] [>]
     * eg : 2 = [<][...] [c-2] [c-1] [c] [c+1] [c+2] [...] [>]
     * @var int - default : 2
     */
    protected $paginatorRange;

    /**
     * Number of element per page you want to return
     * @var int - default : 3
     */
    protected $elementsPerPage;

    /**
     * Current page you want to return. If you are over limits, paginator will only return empty array (array([]))
     * If you want to test if the current page is existing, you can use method {::currentPageExist()}
     * @var int - default : 1
     */
    protected $currentPage;

    /**
     * Total page you have in your data array
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
     * @var array
     */
    protected $pageList = [];
    
    /**
     * If the next page exist, return page number, else return false
     * You can use {::isCurrentPageLastOne} to have a true/false return.
     * @var mixed (boolean - int)
     */
    protected $nextPage;

    /**
     * If the previous page exist, return page number, else return false
     * You can use {::isCurrentPageFirstOne} to have a true/false return.
     * @var mixed (boolean - int)
     */
    protected $previousPage;


    /**
     * Construct a paginator with your data array and parameters.
     *
     * @param array elementToPaginate - The Data array
     * @param int   currentPage - The current page you are
     * @param int   elementPerPage - Number of element per page you want to have
     * @param int   paginatorRange - The range of page you have in your paginator. See property documentation to understand this one.
     */
    public function __construct(array $elementToPaginate, $currentPage = 1, $elementsPerPage = 3, $paginatorRange = 2){

        if(!is_int($currentPage) or !is_int($elementsPerPage) or !is_int($paginatorRange))
            throw new \Exception("Paginator need integer", 1);

        $this->elementsPerPage = $elementsPerPage;
        $this->paginatorRange = $paginatorRange;
        $this->currentPage = $currentPage;
        $this->elementToPaginate = $elementToPaginate;

        // Maximum existing page
        $this->totalPage = intval(ceil(count($this->elementToPaginate)/$this->elementsPerPage));

        // True : False depending if exist a page before/after current, else prev/next page number;
        $this->nextPage = (($this->currentPage+1) > $this->totalPage) ?false:$this->currentPage+1;
        $this->previousPage = (($this->currentPage-1) < 1) ?false:$this->currentPage-1;

        // Get the page list from current page
        $this->buildPageList();

    }

    /**
     * Build the 'page list'. See doc of property. Internal use only.
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
     * Return an array of data for the current page.
     * @return array
     */
    public function getElementsForCurrentPage(){
        return $this->getElementsForPage($this->currentPage);
    }

    /**
     * Return an array of data for the specified page.
     * @return array
     */
    public function getElementsForPage($page){

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
        if($page >= 1 && $page <= $this->totalPage)
            return true;
        return false;
    }

    /**
     * Return true if current page is the first one
     * @return bool
     */
    public function isCurrentPageFirstOne(){
        if($this->currentPage == 1)
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
}


/**
 * Paginator is a generic class used to easing pagination when you need full control of Data and/or UI.
 *
 * First, we assume that you want a classic paginator like this one :
 *
 * [<][...] [c-2] [c-1] [c] [c+1] [c+2] [...] [>]
 * (where c = current page)
 *
 * To perform it job, Paginator need a data array, :
 * ['A', 'B', 'C', 'D'] ...
 *
 * It could be any array, like PDO:FETCH_OBJ / PDO:FETCH_ASSOC or custom data
 *
 * Also, you can custom this parameters :
 *  - Current page = (default : 1)
 *  - Elements per page = (default : 3)
 *  - Paginator range (default : 2)
 *
 *
 * So, Paginator can return data array for current page, page x and answer few question to help in your UI building, like :
 *    - Is current page the last / first one ?
 *    - Can all page before/after range be displayed ?
 *
 * So, you just have to put a condition, eg : if($paginator->nextPageExist()) and it become really easy to customize your UI.
 *
 * See the examples bellow for more informations.
 */
/*
// You can try this Example :

$EgData   = [ ['A1', 'A2', 'A3'],
              ['B1', 'B2', 'B3'],
              ['C1', 'C2', 'C3'],
              ['D1', 'D2', 'D3'],
              ['E1', 'E2', 'E3'],
              ['F1', 'F2', 'F3'],
              ['G1', 'G2', 'G3'],
              ['H1', 'H2', 'H3'],
              ['I1', 'I2', 'I3'],
              ['J1', 'J2', 'J3'],
              ['K1', 'K2', 'K3'],
              ['L1', 'L2', 'L3'],
              ['M1', 'M2', 'M3'],
              ['N1', 'N2', 'N3'],
              ['O1', 'O2', 'O3'],
              ['P1', 'P2', 'P3'],
              ['Q1', 'Q2', 'Q3'],
              ['R1', 'R2', 'R3'],
              ['S1', 'S2', 'S3'],
              ['T1', 'T2', 'T3'],
              ['U1', 'U2', 'U3'],
              ['V1', 'V2', 'V3'],
              ['W1', 'W2', 'W3'],
              ['X1', 'X2', 'X3'],
              ['Y1', 'Y2', 'Y3'],
              ['Z1', 'Z2', 'Z3'],
            ];

 $paginator = New Paginator($EgData, 2); // ($elementsPerPage = 3, $paginatorRange = 2)

 $currentPageData = $paginator->getElementsForCurrentPage();

 // $currentPageData : [
                        ['B1', 'B2', 'B3'],
                        ['C1', 'C2', 'C3'],
                        ['D1', 'D2', 'D3']
                       ]
*/
