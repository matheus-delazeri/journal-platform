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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->unsignedBigInteger('timeline_id')->nullable();
            $table->foreign('timeline_id')->references('id')->on('timelines');
            $table->string('title');
            $table->string('state')->default(\App\Models\Post::STATE_DRAFT);
            $table->text('short_content');
            $table->text('content');
            $table->date('date');
            $table->string('image', 255)->default(asset('media/placeholder.png'));
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
