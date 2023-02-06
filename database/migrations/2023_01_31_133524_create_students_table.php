<?php

use App\Enums\AcademicFieldMajor;
use App\Enums\GenderEnum;
use App\Enums\StudentIdentityTypeEnum;
use App\Enums\UserStatusEnum;
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
        Schema::create('students', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->snowflakeId('user_id');
            $table->date('date_of_birth');
            $table->string('mobile_number');
            $table->enum('identity_type', collect(StudentIdentityTypeEnum::class)->enum()->values());
            $table->string('identity_number', 15);
            $table->enum('gender', collect(GenderEnum::class)->enum()->values());
            $table->string('nationality')->nullable();
            $table->enum('academic_field', collect(AcademicFieldMajor::class)->enum()->values());
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->longText('address');
            $table->enum('status', collect(UserStatusEnum::class)->enum()->values());
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
