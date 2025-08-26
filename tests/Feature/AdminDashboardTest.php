<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Quote;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin/dashboard')->assertRedirect(route('admin.login.form'));
    }

    public function test_can_login_and_view_dashboard(): void
    {
        Quote::create([
            'service' => 'Steel Fabrication',
            'timeline' => '2-4 weeks',
            'budget' => '£1,000 - £5,000',
            'location' => 'Manchester',
            'access' => 'Easy',
            'details' => 'Sample details',
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'john@example.com',
            'phone' => '07000000000',
        ]);

        $res = $this->post('/admin/login', [
            'username' => env('ADMIN_USER','admin'),
            'password' => env('ADMIN_PASSWORD','secret'),
        ]);
        $res->assertRedirect(route('admin.dashboard'));

        $this->followRedirects($res)
            ->assertSee('Dashboard')
            ->assertSee('Steel Fabrication');
    }

    public function test_cannot_login_with_bad_credentials(): void
    {
        $this->post('/admin/login', [
            'username' => 'wrong',
            'password' => 'invalid',
        ])->assertSessionHasErrors('username');
    }

    public function test_can_update_quote_status(): void
    {
        $quote = Quote::create([
            'service' => 'Structural Welding',
            'timeline' => 'ASAP',
            'budget' => '£5,000 - £20,000',
            'location' => 'Liverpool',
            'access' => 'Restricted',
            'details' => 'Another details block',
            'first_name' => 'Alice',
            'last_name' => 'Jones',
            'email' => 'alice@example.com',
        ]);

        $this->post('/admin/login', [
            'username' => env('ADMIN_USER','admin'),
            'password' => env('ADMIN_PASSWORD','secret'),
        ])->assertRedirect(route('admin.dashboard'));

        $resp = $this->post(route('admin.quotes.status', $quote), [
            'status' => 'in_progress'
        ]);
        $resp->assertRedirect(route('admin.quotes.show', $quote));
        $this->assertDatabaseHas('quotes', [ 'id' => $quote->id, 'status' => 'in_progress']);
    }

    public function test_can_export_csv(): void
    {
        Quote::create([
            'service' => 'Repairs',
            'timeline' => 'Flexible',
            'budget' => '£1,000 - £5,000',
            'location' => 'Leeds',
            'access' => 'Indoor only',
            'details' => 'Repair description',
            'first_name' => 'Bob',
            'last_name' => 'Taylor',
            'email' => 'bob@example.com',
        ]);

        $this->post('/admin/login', [
            'username' => env('ADMIN_USER','admin'),
            'password' => env('ADMIN_PASSWORD','secret'),
        ])->assertRedirect(route('admin.dashboard'));

        $res = $this->get(route('admin.quotes.export'));
        $res->assertOk();
        $this->assertInstanceOf(StreamedResponse::class, $res->baseResponse);
        $this->assertStringStartsWith('text/csv', $res->headers->get('Content-Type'));
    }
}
