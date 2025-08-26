<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\QuoteMessage;
use App\Mail\QuoteStatusUpdatedMail;
use App\Mail\QuoteMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $quotes = Quote::latest()->paginate(20);
        $stats = [
            'total' => Quote::count(),
            'new' => Quote::where('status','new')->count(),
            'in_progress' => Quote::where('status','in_progress')->count(),
            'closed' => Quote::where('status','closed')->count(),
        ];
        return view('admin.dashboard', compact('quotes','stats'));
    }

    public function show(Quote $quote)
    {
        return view('admin.quote-show', compact('quote'));
    }

    public function updateStatus(Request $request, Quote $quote)
    {
        $request->validate(['status' => 'required|in:new,in_progress,closed']);
        $quote->update(['status' => $request->input('status')]);
        try { Mail::to($quote->email)->send(new QuoteStatusUpdatedMail(['quote'=>$quote->toArray(),'status'=>$quote->status])); } catch (\Throwable $e) { report($e); }
        return redirect()->route('admin.quotes.show', $quote)->with('ok','Status updated');
    }

    public function sendMessage(Request $request, Quote $quote)
    {
        $data = $request->validate(['body' => 'required|string|max:4000','email_client' => 'nullable']);
        $msg = $quote->messages()->create(['body' => $data['body'], 'direction' => 'admin']);
        if ($request->has('email_client')) {
            try { Mail::to($quote->email)->send(new QuoteMessageMail(['quote'=>$quote->toArray(),'message'=>$msg->body])); } catch (\Throwable $e) { report($e); }
        }
        return redirect()->route('admin.quotes.show', $quote)->with('ok','Message sent');
    }

    public function exportCsv(): StreamedResponse
    {
        $filename = 'quotes_export_'.now()->format('Ymd_His').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];
        $callback = function() {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['id','service','timeline','budget','location','access','details','first_name','last_name','email','phone','subscribe','status','created_at']);
            Quote::orderBy('id')->chunk(200, function($chunk) use ($out) {
                foreach ($chunk as $q) {
                    fputcsv($out, [
                        $q->id,$q->service,$q->timeline,$q->budget,$q->location,$q->access,$q->details,$q->first_name,$q->last_name,$q->email,$q->phone,$q->subscribe ? 1:0,$q->status,$q->created_at
                    ]);
                }
            });
            fclose($out);
        };
        return response()->stream($callback, 200, $headers);
    }
}
