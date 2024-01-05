<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\transaction;

class DashboardController extends Controller
{
    public function viewDashboard(){
        $category = category::all();
        $transactions = transaction::all();

         // Prepare the data for the graph
         $data = [];
foreach ($transactions as $transaction) {
    // Debug statements
    //echo "Transaction ID: $transaction->id, IncomeOrExpense: $transaction->IncomeOrExpense, IncomeAmount: $transaction->IncomeAmount, Month: $transaction->transactionMonth<br>";

    $data[] = [
        'transactionMonth' => $transaction->transactionMonth,
        'expenses' => ($transaction->IncomeOrExpense == 'Expense') ? $transaction->IncomeAmount : 0,
        'income' => ($transaction->IncomeOrExpense == 'Income') ? $transaction->IncomeAmount : 0,
    ];
}

        return view('dashboard', ['categoryList' => $category, 'data' => $data]);
    }
}
