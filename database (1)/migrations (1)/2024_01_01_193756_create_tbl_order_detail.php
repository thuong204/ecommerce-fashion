<?php

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
        Schema::create('tbl_order_detail', function (Blueprint $table) {
            $table->Increments('order_deatail_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->String('product_name');
            $table->Float('product_price');
            $table->Float('product_tax');
            $table->Float('product_total_price');
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_order_detail');
    }
};
