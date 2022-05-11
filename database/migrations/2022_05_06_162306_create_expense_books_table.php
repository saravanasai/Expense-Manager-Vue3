<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_user_id')->comment('owner of the book');
            $table->foreign('owner_user_id')->references('id')->on('users');
            $table->string('book_name')->comment('name of the book');
            $table->softDeletes();
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
        Schema::dropIfExists('expense_books');
    }
}
