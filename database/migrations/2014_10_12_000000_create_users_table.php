<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->enum('verified', [0,1]);
            $table->enum('role', [0,1,2])->default('0');
            $table->string('facebook')->nullable();
            $table->string('google')->nullable();
            $table->string('twitter')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
          'firstname' => env('ADMIN_FIRSTNAME','Bhaktij'),
          'lastname' => env('ADMIN_LASTNAME','Koli'),
          'email' => env('ADMIN_PASSWORD','admin'),
          'password' => Hash::make(env('ADMIN_PASSWORD','admin')),
          'verified' => '1',
          'role' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
