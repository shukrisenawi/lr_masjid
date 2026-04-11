<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\PaymentAssignment;
use App\Models\PaymentType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentAssignmentController extends Controller
{
    public function index(): View
    {
        return view('modules.payment-assignments.index', [
            'assignments' => PaymentAssignment::query()->with(['member', 'paymentType', 'records'])->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.payment-assignments.create', [
            'members' => Member::query()->orderBy('full_name')->get(),
            'paymentTypes' => PaymentType::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'payment_type_id' => ['required', 'exists:payment_types,id'],
            'member_id' => ['required', 'exists:members,id'],
            'assigned_at' => ['nullable', 'date'],
            'status' => ['required', 'in:Aktif,Tidak Aktif'],
        ]);

        PaymentAssignment::query()->create($data);

        return redirect()->route('payment-assignments.index')->with('success', 'Ahli berjaya didaftarkan dalam jenis bayaran.');
    }

    public function edit(PaymentAssignment $payment_assignment): View
    {
        return view('modules.payment-assignments.edit', [
            'assignment' => $payment_assignment,
            'members' => Member::query()->orderBy('full_name')->get(),
            'paymentTypes' => PaymentType::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, PaymentAssignment $payment_assignment): RedirectResponse
    {
        $data = $request->validate([
            'payment_type_id' => ['required', 'exists:payment_types,id'],
            'member_id' => ['required', 'exists:members,id'],
            'assigned_at' => ['nullable', 'date'],
            'status' => ['required', 'in:Aktif,Tidak Aktif'],
        ]);

        $payment_assignment->update($data);

        return redirect()->route('payment-assignments.index')->with('success', 'Penetapan bayaran berjaya dikemaskini.');
    }

    public function destroy(PaymentAssignment $payment_assignment): RedirectResponse
    {
        $payment_assignment->delete();

        return redirect()->route('payment-assignments.index')->with('success', 'Penetapan bayaran berjaya dipadam.');
    }
}
