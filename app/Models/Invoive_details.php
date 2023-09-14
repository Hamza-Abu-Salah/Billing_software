<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoive_details extends Model
{
    use HasFactory;
    protected $table = "invoive_details";
    protected $fillable = ['id_Invoice','invoice_number','id_Invoice','product','Section','Status','Value_Status','Payment_Date','note','user'];
}
