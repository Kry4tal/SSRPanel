<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 50)->comment('优惠券名称');
            $table->string('logo', 255)->comment('优惠券LOGO');
            $table->char('sn', 8)->comment('优惠券码');
            $table->tinyInteger('type')->default('1')->comment('类型：1-现金优惠、2-折扣优惠');
            $table->tinyInteger('usage')->default('1')->comment('用途：1-仅限一次性使用、2-可重复使用');
            $table->integer('amount')->default('0')->comment('金额，单位分');
            $table->decimal('discount', 10, 2)->default('0.00')->comment('折扣');
            $table->integer('available_start')->comment('有效期开始');
            $table->integer('available_end')->comment('有效期结束');
            $table->tinyInteger('is_del')->default('0')->comment('是否已删除：0-未删除、1-已删除');
            $table->tinyInteger('status')->default('1')->comment('状态：0-未使用、1-已使用、2-已失效');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
}
