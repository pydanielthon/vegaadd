<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->integer('workers_id')->unsigned();
            $table->decimal('workers_price_hour');

            $table->integer('contrahents_id')->unsigned();
            $table->decimal('contrahents_salary_cash');
            $table->decimal('contrahents_salary_invoice');

            $table->date('work_day');
            $table->decimal('hours', 10, 2 );
            $table->boolean('status_of_billings');

            $table->foreign('contrahents_id')->references('id')->on('contrahents')->onDelete('cascade');
            // $table->foreign('contrahents_salary_cash')->references('salary_cash')->on('contrahents')->onDelete('cascade');
            // $table->foreign('contrahents_salary_invoice')->references('salary_invoice')->on('contrahents')->onDelete('cascade');

            $table->foreign('workers_id')->references('id')->on('workers')->onDelete('cascade');
            // $table->foreign('workers_price_hour')->references('price_hour')->on('workers')->onDelete('cascade');

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
        Schema::dropIfExists('hours');
    }
}