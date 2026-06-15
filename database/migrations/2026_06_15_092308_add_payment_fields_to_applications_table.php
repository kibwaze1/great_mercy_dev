<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            if (!Schema::hasColumn('applications', 'checkout_request_id')) {
                $table->string('checkout_request_id')->nullable()->after('transfer_letter');
            }
            if (!Schema::hasColumn('applications', 'mpesa_transaction_id')) {
                $table->string('mpesa_transaction_id')->nullable()->after('checkout_request_id');
            }
            if (!Schema::hasColumn('applications', 'payment_status')) {
                $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending')->after('mpesa_transaction_id');
            }
            if (!Schema::hasColumn('applications', 'payment_error')) {
                $table->string('payment_error')->nullable()->after('payment_status');
            }
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['checkout_request_id', 'mpesa_transaction_id', 'payment_status', 'payment_error']);
        });
    }
};
