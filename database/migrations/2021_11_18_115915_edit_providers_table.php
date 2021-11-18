<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn('paymentinfo');
            $table->text('company')->nullable();
            $table->text('LINE')->nullable();
            $table->decimal('order_amount', 8, 0)->comment('我方叫貨總金額')->default(0);
            $table->decimal('receipt_amount', 8, 0)->comment('我方收貨總金額')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->text('paymentinfo');
            $table->dropColumn('company');
            $table->dropColumn('LINE');
            $table->dropColumn('order_amount');
            $table->dropColumn('receipt_amount');
        });
    }
}
