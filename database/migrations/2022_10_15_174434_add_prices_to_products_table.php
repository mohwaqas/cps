<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('Bronze_Price')->after('ItemTag');
            $table->decimal('Silver_Price')->after('Bronze_Price');
            $table->decimal('Gold_Price')->after('Silver_Price');
            $table->decimal('Platinum_Price')->after('Gold_Price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('Bronze_Price');
            $table->dropColumn('Silver_Price');
            $table->dropColumn('Gold_Price');
            $table->dropColumn('Platinum_Price');
        });
    }
}
