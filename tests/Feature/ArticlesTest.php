<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    /**
     * user can read articles
     *
     * @return void
     */
    public function testUserCanReadArticles()
    {
        // creating article
        $article = \App\Models\Article::factory()->create();

        // When user visit the articles page
        $response = $this->get('/articles');

        // User should be able to see the article
        $response->assertSee($article->title);
    }

    /**
     * user can see article detail
     *
     * @return void
     */
    public function testUserCanReadSpecificArticle()
    {
        // creating article
        $article = \App\Models\Article::factory()->create();
        // When user visit the article's URL
        $response = $this->get('/articles/'.$article->id);

        // User should be able to see the article
        $response->assertSee($article->title);
    }

    /**
     * Authenticated user can create an Article
     * @return void
     */
    public function testAuthenticatedUsersCanCreateArticle()
    {
        // Given we have an authenticated user
        $this->actingAs(\App\Models\User::factory()->create());

        // article object
        $article = \App\Models\Article::factory()->make();

        // When user submits post request to create articles endpoint
        $this->post('/articles/create',$article->toArray());

        //It gets stored in the database, count should be greater than 0
        $this->assertNotEquals(0,Article::all()->count());
    }

    /**
     * Authenticated user can create an Article
     * @return void
     */
    public function testUnauthenticatedUsersCanNotCreateArticle()
    {

        // we have an article object
        $article = \App\Models\Article::factory()->make();

        // When unauthenticated user submits post request to create task endpoint
        // He/she should be redirected to login page
        $this->post('/articles/create',$article->toArray())
            ->assertRedirect('/login');
    }

}
