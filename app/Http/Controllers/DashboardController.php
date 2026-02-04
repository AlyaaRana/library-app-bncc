<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Category;
use App\Models\Borrowing;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();
        $totalCategories = Category::count();

        $popularBooks = Book::withCount('borrowingDetails')
            ->orderByDesc('borrowing_details_count')
            ->take(5)
            ->get();

        $borrowingsPerMonth = DB::table('borrowings')
            ->select(DB::raw('MONTH(borrow_date) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $months = [];
        $totals = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = date('M', mktime(0, 0, 0, $i, 1));
            $totals[] = $borrowingsPerMonth[$i] ?? 0;
        }


        return view('dashboard', compact(
            'totalBooks',
            'totalMembers',
            'activeBorrowings',
            'totalCategories',
            'popularBooks',
            'months',
            'totals'
        ));
    }
}
