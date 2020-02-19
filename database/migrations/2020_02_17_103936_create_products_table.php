<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('商品名称');
            $table->text('description')->comment('商品详情');
            $table->text('image')->comment('商品封面图片文件路径');
            $table->boolean('on_sale')->default(true)->comment('此商品是否正在售卖');
            $table->unsignedInteger('stock')->default(0)->comment('库存');
            $table->unsignedInteger('sold_count')->default(0)->comment('销量');
            $table->decimal('set_price', 10, 2)->comment('设置的价格');
            $table->decimal('sale_price', 10, 2)->comment('打折以后的价格');
            $table->float('rating')->default(5)->comment('评分');
            $table->unsignedInteger('review_count')->default(0)->comment('评价数量');
            $table->unsignedBigInteger('category_id');
            //$table->enum('type',['hot','recommend','common'])->comment('hot=>热销|recommend=>推荐|common=>普通');
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
        Schema::dropIfExists('products');
    }
}
