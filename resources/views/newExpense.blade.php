<x-app-layout>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card category-card">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder mb-4">New Expense</h5>

                        <!-- Category Form -->
                        <form action="{{route('addExpense')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <!-- Saving Category Type -->
                            <div class="mb-3">
                                <label for="Saving_Category_Type" class="form-label">Saving Category Type</label>
                                <select class="form-select" id="Saving_Category_Type" name="Saving_Category_Type" required>
                                    <option value="" selected disabled>Select Type</option>
                                    @foreach ($categoryList as $index => $category)
                                    @if ($category->categoryType == 'savings')
                                    <option value="{{$category->id}}">{{$category->categoryName}} : Amount  ${{$category->categoryAmount}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>

                            <!-- Income Category Type -->
                            <div class="mb-3">
                                <label for="Expense_Category_Type" class="form-label">Expense Category Type</label>
                                <select class="form-select" id="Expense_Category_Type" name="Expense_Category_Type" required>
                                    <option value="" selected disabled>Select Type</option>
                                    @foreach ($categoryList as $index => $category)
                                        @if ($category->categoryType == 'expense')
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-outline mb-3 mt-4" data-mdb-input-init>
                                <input type="number" id="form12" class="form-control" name="ExpenseAmount" required />
                                <label class="form-label" for="form12">Expense Value</label>
                              </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary categorysubmitbtn">Add Expense</button>
                            </div>
                           
                            
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
 // Disable the default behavior of the number input
 document.getElementById('form12').addEventListener('wheel', function(e) {
            e.preventDefault();
        });

        document.getElementById('form12').addEventListener('input', function(e) {
            var input = e.target,
                value = input.value;

            if (value < 0 || Math.floor(value) != value) {
                input.value = 0;
            }
        });
        document.getElementById('form12').addEventListener('keydown', function(e) {
            if (e.key === '-') {
                e.preventDefault();
            }
        });
    </script>
</x-app-layout>
