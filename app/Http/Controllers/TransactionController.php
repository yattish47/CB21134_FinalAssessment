<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\transaction;

class TransactionController extends Controller
{

            public function viewTransactionList(){
                $transaction = transaction::all();

                $SavingCategory = category::all();
                
                
                return view('transaction', ['transactionList' => $transaction, 'SavingCategoryList' => $SavingCategory]);
            }

            public function getCategoryListForIncome(){
                $category = category::all();
                return view('newIncome', ['categoryList' => $category]);
            }

            public function getCategoryListForExpense(){
                $category = category::all();
                return view('newExpense', ['categoryList' => $category]);
            }

            public function newIncome(Request $request)
        {
        
            $request->validate([
                'Saving_Category_Type' => 'required',
                'Income_Category_Type' => 'required',
                'IncomeAmount' => 'required|numeric|min:0',
            ]);
            
            // Retrieve data from the request
            $incomeAmount = $request->input('IncomeAmount');
            $savingCategoryId = $request->input('Saving_Category_Type');
            $incomeCategoryId = $request->input('Income_Category_Type');
            $transactionMonth = now()->format('F'); //store the current month

            
            $transaction = new Transaction();

        
            $transaction->savingCategory_id = $savingCategoryId; 
            $transaction->IncomeOrExpense = 'Income'; 
            $transaction->incomeExpenseCategoryID = $incomeCategoryId; 
            $transaction->IncomeAmount = $incomeAmount;
            $transaction->transactionMonth = $transactionMonth;

            $savingCategory = category::where('id', $savingCategoryId)->first();
            $incomeCategory = category::where('id', $incomeCategoryId)->first();

            $savingCategory->categoryAmount = $savingCategory->categoryAmount + $incomeAmount;
            $incomeCategory->categoryAmount = $incomeCategory->categoryAmount + $incomeAmount;

            $savingCategory->save();
            $incomeCategory->save();
            // Save the transaction to the database
            $transaction->save();

        
            return redirect()->route('transaction'); 
        }


        public function newExpense(Request $request){
            $request->validate([
                'Saving_Category_Type' => 'required',
                'Expense_Category_Type' => 'required',
                'ExpenseAmount' => 'required|numeric|min:0',
            ]);
            
            // Retrieve data from the request
            $ExpenseAmount = $request->input('ExpenseAmount');
            $savingCategoryId = $request->input('Saving_Category_Type');
            $expenseCategoryId = $request->input('Expense_Category_Type');
            $transactionMonth = now()->format('F'); //store the current month

            
            $transaction = new Transaction();

        
            $transaction->savingCategory_id = $savingCategoryId; 
            $transaction->IncomeOrExpense = 'Expense'; 
            $transaction->incomeExpenseCategoryID = $expenseCategoryId; 
            $transaction->IncomeAmount = $ExpenseAmount;
            $transaction->transactionMonth = $transactionMonth;

            $savingCategory = category::where('id', $savingCategoryId)->first();
            $expenseCategory = category::where('id', $expenseCategoryId)->first();

            $savingCategory->categoryAmount = $savingCategory->categoryAmount - $ExpenseAmount;
            $expenseCategory->categoryAmount = $expenseCategory->categoryAmount + $ExpenseAmount;

            $savingCategory->save();
            $expenseCategory->save();
            // Save the transaction to the database
            $transaction->save();

        
            return redirect()->route('transaction'); 
        }
}
