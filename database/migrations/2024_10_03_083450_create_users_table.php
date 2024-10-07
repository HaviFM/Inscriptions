<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('name', 255);
            $table->string('surname')->default(''); // Définir une valeur par défaut ici
            $table->string('username', 255)->unique();
            $table->string('password', 255);
            $table->string('email', 255)->unique();
            $table->string('tel', 255);
            $table->foreignId('role_id')->constrained('roles')->default(1);  
            $table->enum('statut',['en_attente','valide','refuse'])->default('en_attente'); // Pour le statut de l'utilisateur
            $table->timestamps(); // Pour created_at et updated_at
            $table->softDeletes(); // Pour le champ deleted_at (soft delete)
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
