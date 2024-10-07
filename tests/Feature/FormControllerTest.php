<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FormModel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        \Illuminate\Support\Facades\Session::start();  // Démarre la session pour les tests
    }

    /**
     * @test
     */
    
    public function a_user_can_register_successfully()
    {
        // Envoi des données d'inscription valides
        $response = $this->post('/inscription', [
            'name' => 'John',
            'surname' => 'Doe',
            'username' => 'johndoe',
            'password' => 'password123',
            'email' => 'john@example.com',
            'tel' => '0102030405',
        ]);

        // Vérification de la redirection après l'inscription
        $response->assertRedirect(route('form.create'));

        // Vérification qu'un utilisateur a bien été créé dans la base de données
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
            'username' => 'johndoe',
            'statut' => 'en_attente',  // Vérifier le statut par défaut
        ]);
    }

    /**
     * @test
     */
    public function test_registration_requires_all_fields()
    {
        $response = $this->post('/inscription', []);
    
        // Dump response to inspect it
        dd($response->getContent());  // Pour voir le contenu de la réponse
    
        $response->assertSessionHasErrors([
            'name', 'surname', 'username', 'email', 'tel', 'password',
        ]);
    }
    

    /**
     * @test
     */
    public function email_must_be_unique()
    {
        // Création d'un utilisateur avec un email spécifique
        FormModel::create([
            'name' => 'Jane',
            'surname' => 'Doe',
            'username' => 'janedoe',
            'password' => bcrypt('password123'),
            'email' => 'jane@example.com',
            'tel' => '0102030405',
            'role_id' => 1,  // Ajouter un rôle
        ]);

        // Tentative d'inscription avec le même email
        $response = $this->post('/inscription', [
            'name' => 'John',
            'surname' => 'Doe',
            'username' => 'johndoe',
            'password' => 'password123',
            'email' => 'jane@example.com', // Email en double
            'tel' => '0102030405',
            'role_id' => 1,  // Ajouter un rôle
        ]);

        // Vérifier qu'une erreur de validation est retournée pour l'email
        $response->assertSessionHasErrors(['email']);
    }
}
