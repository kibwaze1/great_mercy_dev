<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('mpesa_transaction_id')->nullable()->after('transfer_letter');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending')->after('mpesa_transaction_id');
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['mpesa_transaction_id', 'payment_status']);
        });
    }
};
