<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product_id',
        'section_id',
        'amount_collection',
        'amount_commision',
        'discount',
        'vat_rate',
        'vat_value',
        'total',
        'status',
        'note',
        'payment_date',
        'user_id',
        'invoice_attachment'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function invoiceStatus($status)
    {
        return $status == 0 ? 'Unpaid' : 'Paid';
    }
}
