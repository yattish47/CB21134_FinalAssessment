<x-app-layout>
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-center">
            <div class="card category-card" style="width: 85%">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-bolder mt-2">Your Categories</h5>
                        <button type="button" class="btn btn-outline-warning mb-4" data-mdb-ripple-init
                            data-mdb-ripple-color="dark" onclick="window.location='{{ route('newCategory') }}'">New
                            Category</button>
                    </div>

                    <table class="table styled-table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Type</th>
                                <th scope="col">Total Value</th>
                                <th scope="lastcol">Action</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider table-divider-color">

                            @foreach ($categoryList as $index => $category)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $category->categoryName }}</td>

                                    @if ($category->categoryType == 'savings')
                                        <td><span class="badge badge-primary rounded-pill d-inline">Savings</span></td>
                                    @elseif($category->categoryType == 'income')
                                        <td><span class="badge badge-success rounded-pill d-inline">Income</span></td>
                                    @elseif($category->categoryType == 'expense')
                                        <td><span class="badge badge-danger rounded-pill d-inline">Expense</span></td>
                                    @endif

                                    @if ($category->categoryAmount == null)
                                        <td>0</td>
                                    @else
                                        @if ($category->categoryType == 'savings')
                                            <td class="text-primary"><i class="fa-solid fa-money-bill-wave me-2"
                                                    style="color: #005eff; font-size:20px"></i>{{ $category->categoryAmount }}
                                            </td>
                                        @elseif($category->categoryType == 'income')
                                            <td class="text-success"><i class="fa-solid fa-arrow-up me-2"
                                                    style="color: #00ff11; font-size:20px"></i>{{ $category->categoryAmount }}
                                            </td>
                                        @elseif($category->categoryType == 'expense')
                                            <td class="text-danger"><i class="fa-solid fa-down-long me-2"
                                                    style="color: #ff0000; font-size:20px"></i>{{ $category->categoryAmount }}
                                            </td>
                                        @endif
                                    @endif
                                    <td>
                                        <div class="btn-group shadow-0" role="group" style="margin-left: -20px">

                                            <button type="button" class="btn btn-link" data-mdb-color="dark"
                                                onclick="window.location='{{ route('editCategory', ['id' => $category->id]) }}'"><i
                                                    class="fa-regular fa-pen-to-square"
                                                    style="color: #624de3; font-size: 20px;"></i></button>

                                                    <button type="button" class="btn btn-link" data-mdb-color="dark" data-category-id="{{ $category->id }}" data-mdb-modal-init data-mdb-target="#staticBackdrop"><i
                                                    class="fa-regular fa-trash-can"
                                                    style="color: #a30d11; font-size: 20px;"></i></button>


                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Are You Sure You Want to
                                        Delete Your Category?</h5>

                                   <button type="button" class="btn-close" style="color: black" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                                    <button type="button" id="confirmDelete" class="btn btn-danger" id="confirmDelete"
                                     style="background-color: #a30d11" onclick="deleteCategory({{ $category->id }})">Yes</button>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteCategory(id) {
          window.location = "category/deleteCategory/" + id; 
          
        }
        </script>
</x-app-layout>
