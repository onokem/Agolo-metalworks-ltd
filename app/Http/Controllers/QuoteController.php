<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Mail\QuoteRequestMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function store(StoreQuoteRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['subscribe'] = isset($data['subscribe']) ? (bool)$data['subscribe'] : false;

        try { Quote::create($data); } catch (\Throwable $e) { report($e); }

        // Send email to company inbox (configure in .env: MAIL_TO_ADDRESS)
        $to = config('mail.to.address', env('MAIL_TO_ADDRESS', 'info@agolosteelworks.co.uk'));
        try { Mail::to($to)->send(new QuoteRequestMail($data)); } catch (\Throwable $e) { report($e); }

        return response()->json([
            'ok' => true,
            'message' => 'Quote request received.',
        ]);
    }
}
