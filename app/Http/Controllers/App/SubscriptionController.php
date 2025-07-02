<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Invoice;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\LaravelPdf\Enums\Format;

use function Spatie\LaravelPdf\Support\pdf;

class SubscriptionController extends Controller
{
    public function index()
    {
        // Fetch user's subscriptions
        $subscriptions = Subscription::with(['user', 'plan', 'billingAddress', 'shippingAddress'])
            ->where('user_id', auth()->id())
            ->get();

        $invoices = Invoice::with(['plan', 'subscription'])->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Return view with subscriptions data
        return view('app.subscriptions', [
            'subscriptions' => $subscriptions,
            'invoices' => $invoices,
        ]);
    }

    public function invoice(Request $request, string $id)
    {
        // Mail::to("ameename406@gmail.com")->send(new WelcomeMail());
        // return (new WelcomeMail())->render();
        // dd("mail send");

        $invoice = Invoice::with(['plan', 'subscription', 'subscription.billingAddress'])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail(); 

        // save file to disk
        pdf()
        ->view('app.invoice', compact('invoice'))
        ->format(Format::A4)
        ->disk('imagekit', 'public')
        ->save("annahda/invoices/annahda-invoice-{$invoice->invoice_number}.pdf");

        return pdf()
            ->view('app.invoice', compact('invoice'))
            ->format(Format::A4)
            ->name("annahda-invoice-{$invoice->invoice_number}.pdf")
            ->download();
    }
}
