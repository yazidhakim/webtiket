<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Ticket;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;
class FrontService
{
    protected $categoryRepository;
    protected $ticketRepository;
    protected $sellerRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository,
    CategoryRepositoryInterface $categoryRepository, SellerRepositoryInterface $sellerRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->ticketRepository = $ticketRepository;
        $this->sellerRepository = $sellerRepository;
    }

    public function getFrontPageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $sellers = $this->sellerRepository->getAllSellers();
        $popularTickets = $this->ticketRepository->getPopularTickets(4);
        $newTickets = $this->ticketRepository->getAllNewTickets();

        return compact('categories','sellers', 'popularTickets', 'newTickets');
    }
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

}
