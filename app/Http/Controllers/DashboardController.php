<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\CommitteeMember;
use App\Models\DeathRecord;
use App\Models\Document;
use App\Models\Member;
use App\Models\PaymentRecord;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'stats' => [
                'members' => Member::query()->count(),
                'committeeMembers' => CommitteeMember::query()->count(),
                'announcements' => Announcement::query()->count(),
                'documents' => Document::query()->count(),
                'deathRecords' => DeathRecord::query()->count(),
                'payments' => PaymentRecord::query()->sum('amount'),
            ],
            'recentAnnouncements' => Announcement::query()->latest()->limit(5)->get(),
            'recentDeaths' => DeathRecord::query()->latest('death_time')->limit(5)->get(),
        ]);
    }
}
