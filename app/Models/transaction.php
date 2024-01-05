<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
