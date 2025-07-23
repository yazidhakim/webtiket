<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Services\FrontService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }
    // konsep service repository pattern
    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);
    }

    // model binding
    public function details(Ticket $ticket){
        return view('front.details', compact('ticket'));
    }
    public function category(Category $category){
        $categories = $this->frontService->getAllCategories();
        return view('front.category', compact('category', 'categories'));
    }

    //konsep mvcp
    // public function index(){
    //     $categories = Category::latest()->get();
    //     $popular_tickets = Ticket::where('popular', true)->take(4)->get();
    //     $new_tickets = Ticket::latest()->get();
    //     return view('front.index', compact('categories', 'popular_tickets', 'new_tickets'));
    // }
}
