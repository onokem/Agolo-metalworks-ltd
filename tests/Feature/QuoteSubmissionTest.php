<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteSubmissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_accepts_a_valid_quote_request_and_sends_mail_and_stores_record()
    {
        Mail::fake();

        $payload = [
            'service' => 'Steel Fabrication',
            'timeline' => '2-4 weeks',
            'budget' => '£1,000 - £5,000',
            'location' => 'London',
            'access' => 'Easy vehicle access',
            'details' => 'Handrail approx 3m, mild steel, powder-coated.',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'phone' => '07123456789',
            'subscribe' => 'on',
        ];

        $res = $this->post('/quote', $payload, ['X-Requested-With' => 'XMLHttpRequest']);

        $res->assertStatus(200)
            ->assertJson(['ok' => true]);

        Mail::assertSent(QuoteRequestMail::class, function ($mailable) use ($payload) {
            return isset($mailable->data) && $mailable->data['email'] === $payload['email'];
        });

        $this->assertDatabaseHas('quotes', [
            'email' => 'jane@example.com',
            'service' => 'Steel Fabrication',
        ]);
    }
}
