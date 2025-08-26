<?php

namespace Tests\Feature;

use Tests\TestCase;

class FrontendPagesTest extends TestCase
{
    public function test_home_page_renders_with_nav_and_ctas(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Agolo Steelworks', false);
        $response->assertSee('Get Quote', false);
        $response->assertSee('Services', false);
        $response->assertSee('Portfolio', false);
        $response->assertSee('About', false);
        $response->assertSee('Contact', false);
    }

    public function test_services_page_renders_and_has_cta(): void
    {
        $response = $this->get(route('services'));
        $response->assertOk();
        $response->assertSee('Our Services', false);
        $response->assertSee('Get Free Quote', false);
    }

    public function test_portfolio_page_renders_and_has_cta(): void
    {
        $response = $this->get(route('portfolio'));
        $response->assertOk();
        $response->assertSee('Our Portfolio', false);
        $response->assertSee('Start Your Project', false);
    }

    public function test_about_page_renders_and_has_cta(): void
    {
        $response = $this->get(route('about'));
        $response->assertOk();
        $response->assertSee('About Agolo Steelworks', false);
        $response->assertSee('Get Free Quote', false);
    }

    public function test_contact_page_renders_and_has_form(): void
    {
        $response = $this->get(route('contact'));
        $response->assertOk();
        $response->assertSee('Contact Us', false);
        $response->assertSee('Send Message', false);
        $response->assertSee('info@agolosteelworks.co.uk', false);
    }

    public function test_quote_page_renders_and_has_form(): void
    {
        $response = $this->get(route('quote'));
        $response->assertOk();
        $response->assertSee('Request a Free Quote', false);
        $response->assertSee('Get My Quote', false);
    }

    public function test_legal_pages_render(): void
    {
        $this->get(route('privacy'))->assertOk()->assertSee('Privacy Policy', false);
        $this->get(route('terms'))->assertOk()->assertSee('Terms of Service', false);
    }
}
