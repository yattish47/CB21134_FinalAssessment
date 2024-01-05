<x-app-layout>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card category-card">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder mb-4">Add New Category</h5>

                        <!-- Category Form -->
                        <form action="{{route('addCategory')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Category Name -->
                            <div class="form-outline mb-3" data-mdb-input-init>
                                <input type="text" id="categoryName" class="form-control" name="categoryName" required />
                                <label class="form-label" for="categoryName">Category Name</label>
                            </div>


                            <!-- Category Type -->
                            <div class="mb-3">
                                <label for="categoryType" class="form-label">Category Type</label>
                                <select class="form-select" id="categoryType" name="categoryType" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="savings">Savings</option>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                            </div>

                            <!-- Initial Amount for Savings -->
                            <div class="mb-3" id="initialAmountInput" style="display: none;">
                                <label for="categoryAmount" class="form-label">Initial Amount for Savings</label>
                                <input type="number" class="form-control" id="categoryAmount" name="categoryAmount">
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary categorysubmitbtn">Add Category</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script> 

 // Get the category type select element
 var categoryTypeSelect = document.getElementById('categoryType');

// Get the initial amount input element
var initialAmountInput = document.getElementById('initialAmountInput');

// Add a change event listener to the category type select
categoryTypeSelect.addEventListener('change', function() {
    // Check if the selected value is 'savings'
    if (categoryTypeSelect.value === 'savings') {
        // If 'savings' is selected, show the initial amount input
        initialAmountInput.style.display = 'block';
    } else {
        // If another option is selected, hide the initial amount input
        initialAmountInput.style.display = 'none';
    }
});

document.getElementById('categoryAmount').addEventListener('wheel', function(e) {
                   e.preventDefault();
               });
       
               document.getElementById('categoryAmount').addEventListener('input', function(e) {
                   var input = e.target,
                       value = input.value;
       
                   if (value < 0 || Math.floor(value) != value) {
                       input.value = 0;
                   }
               });
               document.getElementById('categoryAmount').addEventListener('keydown', function(e) {
                   if (e.key === '-') {
                       e.preventDefault();
                   }
               });
    </script>
</x-app-layout>
