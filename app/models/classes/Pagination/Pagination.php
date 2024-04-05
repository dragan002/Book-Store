<?php

namespace App\models\classes\Pagination;

class Pagination {
    
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;

    public function __construct($totalItems, $itemsPerPage) {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    }

    public function getOffset() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }
    // (4-1) * 3
    public function getTotalPages() {
        return ceil($this->totalItems / $this->itemsPerPage);
    }

    public function generatePagination() {
        $totalPages = $this->getTotalPages();
        $links = '';

        for ($page = 1; $page <= $totalPages; $page++) {
            $active = ($this->currentPage == $page) ? 'active' : '';
            $links .= '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
        }

        return $links;
    }
}
