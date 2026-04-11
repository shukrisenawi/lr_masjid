<?php

namespace App\Http\Controllers;

use App\Models\PaymentAssignment;
use App\Models\PaymentRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentRecordController extends Controller
{
    public function index(): View
    {
        return view('modules.payment-records.index', [
            'records' => PaymentRecord::query()->with(['assignment.member', 'assignment.paymentType'])->latest('paid_at')->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.payment-records.create', [
            'assignments' => PaymentAssignment::query()->with(['member', 'paymentType'])->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'payment_assignment_id' => ['required', 'exists:payment_assignments,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'paid_at' => ['required', 'date'],
            'method' => ['nullable', 'string', 'max:100'],
            'reference_no' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string'],
        ]);

        PaymentRecord::query()->create($data);

        return redirect()->route('payment-records.index')->with('success', 'Rekod bayaran berjaya ditambah.');
    }

    public function edit(PaymentRecord $payment_record): View
    {
        return view('modules.payment-records.edit', [
            'record' => $payment_record,
            'assignments' => PaymentAssignment::query()->with(['member', 'paymentType'])->latest()->get(),
        ]);
    }

    public function update(Request $request, PaymentRecord $payment_record): RedirectResponse
    {
        $data = $request->validate([
            'payment_assignment_id' => ['required', 'exists:payment_assignments,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'paid_at' => ['required', 'date'],
            'method' => ['nullable', 'string', 'max:100'],
            'reference_no' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string'],
        ]);

        $payment_record->update($data);

        return redirect()->route('payment-records.index')->with('success', 'Rekod bayaran berjaya dikemaskini.');
    }

    public function destroy(PaymentRecord $payment_record): RedirectResponse
    {
        $payment_record->delete();

        return redirect()->route('payment-records.index')->with('success', 'Rekod bayaran berjaya dipadam.');
    }
}
