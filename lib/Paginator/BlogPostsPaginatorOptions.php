<?php
namespace Library\Paginator;

use Library\Paginator\PaginatorOptions;

class BlogPostsPaginatorOptions extends PaginatorOptions{
    protected $paginatorRange = 2;
    protected $elementsPerPage = 3;
    protected $URLTemplate = '{page}';
    protected $enableStrictMode = true;
}