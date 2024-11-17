<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_company_id')->comment('利用者企業ID');
            $table->string('name')->comment('顧客名')->index();
            $table->string('company_name')->nullable()->comment('法人名')->index();
            $table->string('invoice_number')->nullable()->comment('請求番号');
            $table->string('email')->nullable()->comment('メールアドレス');
            $table->string('phone')->nullable()->comment('電話番号');
            $table->integer('zip')->nullable()->comment('郵便番号');
            $table->string('country',50)->nullable()->comment('国');
            $table->string('prefecture',10)->nullable()->comment('都道府県');
            $table->string('address')->nullable()->comment('住所');
            $table->text('description')->nullable()->comment('備考');
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
        Schema::dropIfExists('customers');
    }
};
