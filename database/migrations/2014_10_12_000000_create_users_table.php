<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                [
                    'name' => 'Luc Sels',
                    'email' => 'lucsels@fakemail.com',
                    'active' => true,
                    'program_id' => "1",
                    'password' => Hash::make('user1'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'name' => 'Caroline Claes',
                    'email' => 'carolineclaes@fakemail.com',
                    'active' => true,
                    'program_id' => "2",
                    'password' => Hash::make('user2'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'name' => 'Bert Baes',
                    'email' => 'bertbaes@fakemail.com',
                    'active' => true,
                    'program_id' => "3",
                    'password' => Hash::make('user3'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'name' => 'Peter Goris',
                    'email' => 'petergoris@fakemail.com',
                    'active' => true,
                    'program_id' => "4",
                    'password' => Hash::make('user4'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'name' => 'Gusta Meeuws',
                    'email' => 'gustameeuws@fakemail.com',
                    'active' => true,
                    'program_id' => "5",
                    'password' => Hash::make('user5'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
                [
                    'name' => 'Elke Frietmans',
                    'email' => 'frietjes@fakemail.com',
                    'active' => false,
                    'program_id' => "5",
                    'password' => Hash::make('user6'),
                    'created_at' => now(),
                    'email_verified_at' => now()
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
