<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('admin')->default(0);
            $table->string('photoname')->nullable();
            $table->string('firstname',15)->nullable();
            $table->string('surname',15)->nullable();
            $table->string('gender',6)->nullable();
            $table->date('dob')->nullable();
            $table->Integer('age')->nullable();
            $table->BigInteger('mobile')->nullable();
            $table->Integer('height')->nullable();
            $table->Integer('weight')->nullable();
            $table->string('religion',15)->nullable();
            $table->string('cast',15)->nullable();
            $table->string('address')->nullable();
            $table->string('country',15)->nullable();
            $table->string('state',15)->nullable();
            $table->string('city',15)->nullable();
            $table->string('profession',10)->nullable();
            $table->BigInteger('salary')->nullable();
            $table->string('marid',7)->nullable();
            $table->string('blood',7)->nullable();
            $table->string('education',15)->nullable();
            $table->string('mothertoung',10)->nullable();
            $table->string('fathername',15)->nullable();
            $table->string('foccupation',15)->nullable();
            $table->string('mothername',15)->nullable();
            $table->string('moccupation',15)->nullable();
            $table->string('brother',15)->nullable();
            $table->string('sister',15)->nullable();
            $table->Integer('status')->default(0)->comment = '1=active 0=new -1=block';

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
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
