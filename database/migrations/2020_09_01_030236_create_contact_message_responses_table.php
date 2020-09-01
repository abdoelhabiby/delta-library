<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMessageResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_message_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contact_id");
            $table->foreign("contact_id")->references('id')->on('contacts')->onDelete('cascade');
            $table->string("owner_body");
            $table->longText("body");
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
        Schema::dropIfExists('contact_message_responses');
    }
}
