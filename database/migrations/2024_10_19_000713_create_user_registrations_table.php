<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserRegistrationStatusEnum;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('valid_token')->nullable();
            $table->string('token')->nullable();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', UserRegistrationStatusEnum::optionList())->default(UserRegistrationStatusEnum::START->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->dropForeign('user_id_foreign');
        });
        Schema::dropIfExists('user_registrations');
    }
};
