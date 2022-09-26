<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('email', 50)->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 30)->nullable()->change();
            $table->string('last_name', 30)->nullable()->after('first_name');
            $table->enum('type', [10, 20, 30])->default(10)->after('email');
            $table->enum('gender', [10, 20, 30])->default(30)->after('type');
            $table->enum('is_active', [0, 1])->default(1)->after('remember_token');
            $table->string('mobile_number', 15)->nullable()->after('is_active');
        });
        
        DB::table('users')->insert([
            [
                'first_name' => 'Super Administrator',
                'last_name' => '',
                'email' => 'event_ms@admin.com',
                'type' => \UserType::SUPER_ADMIN,
                'gender' => \Gender::UNSPECIFIED,
                'password' => Hash::make('SuperAdmin@233'),
                'remember_token' => null,
                'is_active' => \ActiveStatus::ACTIVE,
                'mobile_number' => null,
                'profile_photo_path' => null
            ],
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
};
