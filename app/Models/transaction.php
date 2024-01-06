<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21134
// Student Name: Yattish A/L Jaya Nanda Kumar

class transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable = [
        'savingCategory_id',
        'IncomeOrExpense',
        'incomeExpenseCategoryID',
        'IncomeAmount',
        'transactionMonth',
    ];
}
