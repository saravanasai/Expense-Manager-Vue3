<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expense_book_id');
            $table->foreign('expense_book_id')->references('id')->on('expense_books')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('expense_category')->nullable()->default(null);
            $table->foreign('expense_category')->references('id')->on('categories')->cascadeOnDelete();
            $table->bigInteger('expense_amount');
            $table->tinyInteger('expense_type')->default(1)->comment('1 means expense 2 means income');
            $table->string('expense_note')->nullable()->default(null);
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
        Schema::dropIfExists('expenses');
    }
}
