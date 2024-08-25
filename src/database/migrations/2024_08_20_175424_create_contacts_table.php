<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->tinyInteger('gender')->unsigned()->comment('1: Male, 2: Female, 3: Other');
            $table->string('email', 255)->nullable(false);
            $table->string('tell', 255)->nullable(false);
            $table->string('address', 255)->nullable(false);
            $table->string('building', 255);
            $table->text('detail')->nullable(false);
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
