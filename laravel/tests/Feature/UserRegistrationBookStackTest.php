<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\BookStack\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class UserRegistrationBookStackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test basique pour vérifier que la page d'accueil répond (sanity check)
     */
    public function test_home_page_responds_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test pour vérifier la création d'un utilisateur Laravel et BookStack via l'inscription
     */
    public function test_it_creates_bookstack_user_on_registration(): void
    {
        // 1. On mock le UserService pour ne pas appeler la vraie API BookStack
        $mock = Mockery::mock(UserService::class);
        
        // On s'attend à ce que createUser soit appelé exactement 1 fois avec n'importe quel argument
        $mock->shouldReceive('createUser')->once()->andReturn([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

        // 2. Laravel utilisera ce mock pendant ce test au lieu du vrai UserService
        $this->app->instance(UserService::class, $mock);

        // 3. On simule la soumission du formulaire d'inscription
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // 4. Vérifications après inscription :
        // Vérifie que la redirection est bien faite vers le dashboard
        $response->assertRedirect('/dashboard');

        // Vérifie que l'utilisateur est bien enregistré en base de données
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com'
        ]);
    }

    /**
     * Nettoyer les mocks après chaque test
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }
}
