<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->after('id');
            $table->enum('gender', ['male', 'female'])->after('email');
            $table->integer('age')->after('gender');
            $table->date('birth_date')->after('age');
            $table->string('address')->after('birth_date');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'gender', 'age', 'birth_date', 'address']);
        });
    }
};
