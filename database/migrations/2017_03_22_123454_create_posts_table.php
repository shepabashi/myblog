<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->references('users')->on('id')->onDelete('cascade');

            $table->text('title');
            $table->longText('content');
            $table->longText('content_filtered');
            $table->string('content_filtered_type', 20)->default('markdown');

            $table->enum('status', [
                'publish', 'pending', 'draft', 'private', 'static', 'future', 'require_password',
            ])->default('publish');

            $table->string('post_password', 200);
            $table->string('slug', 200)->unique();

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
}
