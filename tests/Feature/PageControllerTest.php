<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    public function test_home_page_loads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_valid_pages_load()
    {
        $pages = ['properties', 'about', 'services', 'contact'];
        
        foreach ($pages as $page) {
            $response = $this->get("/{$page}");
            $response->assertStatus(200);
        }
    }

    public function test_invalid_page_returns_404()
    {
        $response = $this->get('/invalid-page');
        $response->assertStatus(404);
    }
}