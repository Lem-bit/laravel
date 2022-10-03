<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_categories_page_response_200()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }

    public function test_admin_page_response_200() {
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function test_admin_page_content_ok() {
        $response = $this->get('/admin');
        $response->assertSee('Добавить новость');
    }

    public function test_addnews_page_content_ok () {
        $response = $this->get('/admin/create_news');
        $response->assertStatus(200)->assertSee('Форма добавления новости');
    }

    public function test_categories_page_file_upload () {
        $this->postJson( '/admin/save_news', ['id_category' => 2])
            ->assertStatus(200)
            ->assertHeader('content-disposition')
            ->assertJsonStructure([
            '*'=> [
                'id',
                'id_category',
                'title',
                'text',
                'isPrivate']
            ]);
    }
}
