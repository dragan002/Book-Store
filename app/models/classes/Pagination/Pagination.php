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
        $prevPage = max(1, $this->currentPage - 1);
        $nextPage = min($totalPages, $this->currentPage + 1);
    
        // Previous page link
        $links .= '<li class="page-item ' . ($this->currentPage == 1 ? 'disabled' : '') . '">';
        $links .= '<a class="page-link" href="?page=' . $prevPage . '">Previous</a>';
        $links .= '</li>';
    
        // Page links
        $startPage = max(1, $this->currentPage - 4); // Start from current page - 2
        $endPage = min($totalPages, $startPage + 4); // Display up to 5 pages
    
        for ($page = $startPage; $page <= $endPage; $page++) {
            $active = ($this->currentPage == $page) ? 'active' : '';
            $links .= '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
        }
    
        // Next page link
        $links .= '<li class="page-item ' . ($this->currentPage == $totalPages ? 'disabled' : '') . '">';
        $links .= '<a class="page-link" href="?page=' . $nextPage . '">Next</a>';
        $links .= '</li>';
    
        // Last page link
        $links .= '<li class="page-item">';
        $links .= '<a class="page-link" href="?page=' . $totalPages . '">>></a>';
        $links .= '</li>';
    
        return $links;
    }
    
}
