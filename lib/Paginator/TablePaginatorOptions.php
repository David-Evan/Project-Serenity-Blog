<?php
namespace Library\Paginator;

use Library\Paginator\PaginatorOptions;

class TablePaginatorOptions extends PaginatorOptions{
    protected $paginatorRange = 2;
    protected $elementsPerPage = 10;
    protected $enableStrictMode = true;
}