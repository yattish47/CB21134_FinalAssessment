<x-app-layout>
  <div class="container-fluid mt-4">
      <div class="d-flex justify-content-center">
          <div class="card category-card" style="width: 85%">
              <div class="card-body">
                  <div class="d-flex justify-content-between">
                      <h5 class="card-title fw-bolder mt-2">Transaction History</h5>
                      <div class="d-flex justify-content-end">
                          <button type="button" class="btn btn-outline-warning mb-4 me-3" data-mdb-ripple-init data-mdb-ripple-color="dark" onclick="window.location='{{ route('newIncome') }}'">New Income</button>
                          <button type="button" class="btn btn-outline-warning mb-4" data-mdb-ripple-init data-mdb-ripple-color="dark" onclick="window.location='{{ route('newExpense') }}'">New Expense</button>
                      </div>
                  </div>
                 
                  <table class="table styled-table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Saving Category</th>
                          <th scope="col">Value</th>
                          <th scope="col">Income/Expense Category</th>
                          <th scope="lastcol">Income/Expense</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider table-divider-color">
                        @foreach($transactionList as $index => $transaction)
                          @php
                              // Find the corresponding SavingCategory based on savingCategory_id
                              $savingCategory = $SavingCategoryList->where('id', $transaction->savingCategory_id)->first();
                              $incomeOrExpenseCategory = $SavingCategoryList->where('id', $transaction->incomeExpenseCategoryID)->first();
                          @endphp
                          @if($savingCategory)
                            <tr>
                              <th scope="row">{{ $index + 1 }}</th>
                              <td>{{ $savingCategory->categoryName }}</td>
                              @if($transaction->IncomeOrExpense == 'Income')
                                <td class="text-success"><i class="fa-solid fa-arrow-up me-2" style="color: #00ff11; font-size:20px"></i>{{ $transaction->IncomeAmount }}</td>
                              @elseif($transaction->IncomeOrExpense == 'Expense')
                                <td class="text-danger"><i class="fa-solid fa-down-long me-2" style="color: #ff0000; font-size:20px"></i>{{ $transaction->IncomeAmount }}</td>
                              @endif
                              <td>{{ $incomeOrExpenseCategory->categoryName }}</td>
                              <td>{{ $transaction->IncomeOrExpense }}</td>
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
