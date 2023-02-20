<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->integer('group_id')->default(2);
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                'name' => 'root',
                'password' => '$2y$10$x4ttMR3sdKEWyyaTomSLGuugKWIA1ex/Lf9GGQdcAXkG11F7zjc3m', // has of 'qwertyuiop123' (bcrypt)
                'group_id' => 1,
                'avatar' => 'agent-k-512.png',
                'email' => 'root@domain.example',
                'email_verified_at' => '2023-01-01',
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Ivan Ivanović',
                'password' => '$2y$10$x4ttMR3sdKEWyyaTomSLGuugKWIA1ex/Lf9GGQdcAXkG11F7zjc3m', // has of 'qwertyuiop123'
                'email' => 'ivanovich@domain.example',
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'test',
                'password' => '$2y$10$/MgsbhFl1NnWQdMURYFZYegeDrq6cyByuzIVoEPcqKXpBzYANPv36', // hash of '123'
                'email' => 'user@domain.example',
            ]
        );
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
};
