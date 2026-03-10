<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Loans', function (Blueprint $table) {
            $table->id();
            $table->string('borrower_name');
            $table->string('borrower_email')->nullable();
            $table->string('book_title');
            $table->date('borrowerd_at')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('returned')->default(false);
            $table->enum('status', ['active', 'returned', 'overdue'])->default('active');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Loan');
    }
};
