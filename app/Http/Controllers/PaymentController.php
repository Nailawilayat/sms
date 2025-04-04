<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('enrollment')->latest()->get();
        return view('payments.index', compact('payments'));
    }


    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        $enrollments = Enrollment::all(); // Get all enrollments for dropdown
        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created payment in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }

    /**
     * Display the specified payment.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit(Payment $payment)
    {
        $enrollments = Enrollment::all();
        return view('payments.edit', compact('payment', 'enrollments'));
    }

    /**
     * Update the specified payment in the database.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
