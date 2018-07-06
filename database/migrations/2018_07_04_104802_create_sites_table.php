<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->unique();
            $table->tinyInteger('is_vulnerable')->default('0');
            $table->string('website_type');
            $table->dateTime('check_update');
            $table->string('site_checkup_report')->nullable();
            $table->string('contact email')->nullable();
            $table->dateTime('contact date')->nullable();
            $table->dateTime('feedback_date')->nullable();
           $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
