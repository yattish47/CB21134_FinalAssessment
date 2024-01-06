<x-app-layout>

     {{-- BCS3453 [PROJECT]-SEMESTER 2324/1
 Student ID: CB21134
 Student Name: Yattish A/L Jaya Nanda Kumar --}}
    
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card category-card">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder mb-4">Edit Category</h5>

                        <!-- Category Form -->
                        <form action="{{route('updateCategory',['id' => $category->id ] )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Category Name -->
                            <div class="form-outline mb-3" data-mdb-input-init>
                                <input type="text" id="form12" class="form-control" required name="categoryName" value="{{$category->categoryName}}"/>
                                <label class="form-label" for="form12">Category Name</label>
                              </div>


                            <!-- Category Type -->
                            <div class="mb-3">
                                <label for="category_type" class="form-label">Category Type</label>
                                <select class="form-select" id="category_type" name="categoryType" required>
                                    <option value="" disabled>Choose Category Type</option>
                                    @if($category->categoryType == 'savings')
                                    <option value="savings" selected>Savings</option>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                    @elseif($category->categoryType == 'income')
                                    <option value="savings">Savings</option>
                                    <option value="income" selected>Income</option>
                                    <option value="expense">Expense</option>
                                    @elseif($category->categoryType == 'expense')
                                    <option value="savings">Savings</option>
                                    <option value="income">Income</option>
                                    <option value="expense" selected>Expense</option>
                                    @endif
                                </select>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary categorysubmitbtn">Save</button>
                            </div>
                           
                            
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
