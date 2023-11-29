<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('Sub_Category_Id')->index()->nullable()->after('Category_Id');
            $table->foreign('Sub_Category_Id')->references('id')->on('categories');

            $table->unsignedBigInteger('Manufacturer_Id')->index()->nullable()->after('Sub_Category_Id');
            $table->foreign('Manufacturer_Id')->references('id')->on('manufacturers');

            $table->unsignedBigInteger('Product_Type_Id')->index()->nullable()->after('Manufacturer_Id');
            $table->foreign('Product_Type_Id')->references('id')->on('product_types');
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
            $table->dropColumn('Sub_Category_Id');
            $table->dropColumn('Manufacturer_Id');
            $table->dropColumn('Product_Type_Id');
        });
    }
}
