<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->foreignId('wallet_id')->constrained();
            $table->unsignedBigInteger('wallet_origin')->references('id')->on('wallets')->nullable();
            $table->foreignId('badge_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->enum('type', ['Input', 'Output', 'Transfer']);
            $table->enum('modality', ['Permanent', 'Extraordinary', 'Common'])->default('Common');
            $table->decimal('amount', 8, 2, true);
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
        Schema::dropIfExists('transactions');
    }
}
