<?php

use Carbon\Carbon;
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider')->nullable()->default('form')->after('email');
            $table->string('provider_id')->nullable()->after('provider');
            $table->tinyInteger('status')->default(1)->comment('1 - Active')->after('profile');
            $table->datetime('last_login_at')->nullable()->default(Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
            $table->dropColumn('status');
            $table->dropColumn('last_login_at');
        });
    }
};
