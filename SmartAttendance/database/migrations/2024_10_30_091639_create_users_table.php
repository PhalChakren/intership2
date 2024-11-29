<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('username')->unique(); // Unique username
            $table->string('email')->unique(); // Unique email
            $table->string('password'); // Password
            $table->foreignId('admin_id')->constrained()->onDelete('cascade'); // Foreign key for admin (adjust as needed)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

