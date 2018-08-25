<?php
namespace Library\Paginator;

use Library\Paginator\PaginatorOptions;

class CommentsPaginatorOptions extends PaginatorOptions{
    protected $paginatorRange = 2;
    protected $elementsPerPage = 8;
    protected $URLTemplate = '{page}';
    protected $enableStrictMode = true;
}