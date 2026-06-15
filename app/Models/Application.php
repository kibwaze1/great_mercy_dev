<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Personal & application details
        'full_name',
        'dob',
        'gender',
        'grade',
        'address',
        'phone',
        'email',
        'parent_name',
        'message',
        // File uploads
        'birth_certificate',
        'transfer_letter',
        // Payment fields
        'checkout_request_id',   // from M-Pesa STK Push
        'mpesa_transaction_id',  // receipt number after successful payment
        'payment_status',        // pending, paid, failed
        'payment_error',         // error message if payment failed
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dob' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the formatted phone number (if needed).
     */
    public function getFormattedPhoneAttribute()
    {
        $phone = $this->phone;
        // Remove any non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        // If it starts with 0, replace with 254
        if (substr($phone, 0, 1) == '0') {
            $phone = '254' . substr($phone, 1);
        }
        return $phone;
    }

    /**
     * Check if payment is completed.
     */
    public function isPaid()
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Scope for pending payments.
     */
    public function scopePendingPayment($query)
    {
        return $query->where('payment_status', 'pending');
    }
}
