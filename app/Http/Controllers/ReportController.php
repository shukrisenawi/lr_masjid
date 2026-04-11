<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecord;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function payments(): View
    {
        $records = PaymentRecord::query()
            ->selectRaw('DATE_FORMAT(paid_at, "%Y-%m") as period, SUM(amount) as total')
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        return view('modules.reports.payments', [
            'labels' => $records->pluck('period'),
            'totals' => $records->pluck('total'),
            'grandTotal' => $records->sum('total'),
        ]);
    }
}
