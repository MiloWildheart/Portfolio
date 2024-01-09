<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the table already exists
        if (!Schema::hasTable('portfolio_items_tags')) {
            Schema::create('portfolio_items_tags', function (Blueprint $table) {
                $table->bigIncrements('id');
                
                //portfolio items
                $table->bigInteger('portfolio_item_id')->unsigned();
                $table->foreign('portfolio_item_id')
                    ->references('id')->on('portfolio_items')
                    ->onDelete('cascade');
                
                //tags 
                $table->bigInteger('tag_id')->unsigned();
                $table->foreign('tag_id')
                    ->references('id')->on('tags')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_items_tags');
    }
};
