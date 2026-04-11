<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentTypeController extends Controller
{
    public function index(): View
    {
        return view('modules.payment-types.index', [
            'paymentTypes' => PaymentType::query()->latest()->get(),
            'methods' => ['Sekali bayar', 'Ansuran', 'Bulanan', 'Tahunan'],
        ]);
    }

    public function create(): View
    {
        return view('modules.payment-types.create', [
            'methods' => ['Sekali bayar', 'Ansuran', 'Bulanan', 'Tahunan'],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:payment_types,name'],
            'method' => ['required', 'in:Sekali bayar,Ansuran,Bulanan,Tahunan'],
            'amount' => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        PaymentType::query()->create($data);

        return redirect()->route('payment-types.index')->with('success', 'Jenis bayaran berjaya ditambah.');
    }

    public function edit(PaymentType $payment_type): View
    {
        return view('modules.payment-types.edit', [
            'paymentType' => $payment_type,
            'methods' => ['Sekali bayar', 'Ansuran', 'Bulanan', 'Tahunan'],
        ]);
    }

    public function update(Request $request, PaymentType $payment_type): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:payment_types,name,'.$payment_type->id],
            'method' => ['required', 'in:Sekali bayar,Ansuran,Bulanan,Tahunan'],
            'amount' => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $payment_type->update($data);

        return redirect()->route('payment-types.index')->with('success', 'Jenis bayaran berjaya dikemaskini.');
    }

    public function destroy(PaymentType $payment_type): RedirectResponse
    {
        $payment_type->delete();

        return redirect()->route('payment-types.index')->with('success', 'Jenis bayaran berjaya dipadam.');
    }
}
