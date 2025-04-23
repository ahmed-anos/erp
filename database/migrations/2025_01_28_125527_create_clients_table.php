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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('country');
            $table->string('car')->unique();
            $table->decimal('installment' ,8 ,2);
            $table->date('start_installment');
            $table->date('current_installment')->nullable();
            $table->date('end_installment');
            $table->integer('installments_count');
            $table->decimal('indebtedness', 10 ,2)->nullable();
            $table->decimal('paid', 10 ,2)->default(0);
            $table->decimal('remaining', 10 ,2)->default(0);
            $table->decimal('interest' ,8,2 )->nullable();
            $table->string('installment_status')->nullable();
            $table->integer('delayed_months')->nullable()->default(0);
            // Guarantor
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_phone')->nullable();

            //Asset 
       
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
