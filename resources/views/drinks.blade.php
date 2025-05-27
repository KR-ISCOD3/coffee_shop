@extends('layouts.app')

@section('title','Drink Page')

@section('content')

    {{-- @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif --}}
    <!-- Table Drink -->
    <div class="px-4 mt-4">
        <div class="bg-body p-4">
            <div class="d-flex justify-content-between">
                <h3 class="m-0">Table Drinks</h3>
                <div class="d-flex">
                    <button class="btn btn-success me-2">Export Excel</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">+ Create Product </button>
                </div>
            </div>
            <div style="height: 550px; overflow-y: auto;">
                <table class="table mt-4">
                    <thead>
                        <tr >
                            <td class="text-secondary fw-medium">Id</td>
                            <td class="text-secondary fw-medium">Drink</td>
                            <td class="text-secondary fw-medium">Size</td>
                            <td class="text-secondary fw-medium">Category</td>
                            <td class="text-secondary fw-medium">Price(small)</td>
                            <td class="text-secondary fw-medium">Price(meduim)</td>
                            <td class="text-secondary fw-medium">Create_Date</td>
                            <td class="text-secondary fw-medium">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($drinks as $index => $drink)
                            <tr class="align-middle ">
                                <td>#{{$index + 1}}</td>
                                <td class="d-flex align-items-center">
                                    <div style="width: 40px;height: 40px;" class="bg-secondary rounded-circle overflow-hidden me-2">
                                        <img src="{{ asset('uploads/' . $drink->image) }}" alt="" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    {{ $drink->name }}
                                <td>
                                    <span class="text-primary">small</span>
                                    /
                                    <span class="text-success">medium</span>
                                </td>
                                <td>
                                    <span class="px-3 bg-info-subtle rounded-2 text-primary">
                                        {{ $drink->category_id }}
                                    </span>
                                </td>
                                <td>
                                    ${{ number_format($drink->small_price, 2) }}
                                </td>
                                <td>
                                    ${{ number_format($drink->medium_price, 2) }}
                                </td>
                                <td>
                                    <span class="px-3 bg-secondary-subtle rounded-2">{{ $drink->created_at->format('d/m/Y') }}</span>
                                </td>
                                <td>
                                    <button class="btn bg-pink-700 text-light editBtn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modaledit"
                                            data-id="{{ $drink->id }}"
                                            data-name="{{ $drink->name }}"
                                            data-category="{{ $drink->category_id }}"
                                            data-small-price="{{ $drink->small_price }}"
                                            data-medium-price="{{ $drink->medium_price }}"
                                            data-image="{{ asset('uploads/' . $drink->image)}}"
                                            >

                                        <i class="bi bi-pencil-square"></i></button>

                                    <button class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modaldelete"
                                            data-id="{{ $drink->id }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- modal add product -->
    <div class="modal fade " id="modaladd" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Add</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('drinksCreate.admin')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <div style="height: 230px;" class="w-100 bg-pink-700">
                                    <img id="previewImg" src="" alt="" class="w-100 h-100 object-fit-cover">
                                </div>
                                <input required  name="image" type="file" id="imageInput" class="d-none">
                                <button class="btn bg-pink-700 text-light w-100 mt-2 rounded-0" id="uploadBtn" type="button">Upload</button>
                            </div>
                            <div class="col-7 p-0 pe-2">
                               <div class="mb-1">
                                <label for="">Drink Name*</label>
                                <input required type="text" name="name" id="name" placeholder="Enter Drink Name" class="form-control shadow-none border rounded-0">
                               </div>
                               <div class="mb-1">
                                <label for="">Category*</label>
                                <select name="category_id" id="category_id" class="form-select shadow-none border rounded-0">
                                    <option value={{1}}>Coffee</option>
                                    <option value={{2}}>Milk-Tea</option>
                                </select>
                               </div>
                               <div class="mb-1">
                                <label for="">Small Price*</label>
                                <input required type="" name="small_price" id="small_price" placeholder="Enter Small Price" class="form-control shadow-none border rounded-0">
                               </div>
                               <div class="mb-1">
                                <label for="">Meduim Price*</label>
                                <input required type="" name="medium_price" id="medium_price" placeholder="Enter Meduim Price" class="form-control shadow-none border rounded-0">
                               </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn bg-pink-700 text-light">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

     <!-- modal edit product -->
    <div class="modal fade " id="modaledit" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-5">
                                <div style="height: 230px;" class="w-100 bg-pink-700">
                                    <img id="editPreviewImg" src="" alt="" class="w-100 h-100 object-fit-cover">
                                </div>
                                <input type="file" name="image"  id="editImageInput" class="d-none">
                                <button class="btn bg-pink-700 text-light w-100 mt-2 rounded-0" id="editUploadBtn" type="button">Upload</button>
                            </div>
                            <div class="col-7 p-0 pe-2">
                               <div class="mb-1">
                                <label for="">Drink Name*</label>
                                <input required type="text" name="name" id="editDrink" placeholder="Enter Drink Name" class="form-control shadow-none border rounded-0">
                               </div>
                               <div class="mb-1">
                                <label for="">Category*</label>
                                <select name="category_id" id="editCategory" class="form-select shadow-none border rounded-0">
                                    <option value="1">Coffee</option>
                                    <option value="2">Milk-Tea</option>
                                </select>
                               </div>
                               <div class="mb-1">
                                <label for="">Small Price*</label>
                                <input required type="text" name="small_price" id="editSmallPrice" placeholder="Enter Small Price" class="form-control shadow-none border rounded-0">
                               </div>
                               <div class="mb-1">
                                <label for="">Meduim Price*</label>
                                <input required type="text" name="medium_price" id="editMediumPrice" placeholder="Enter Meduim Price" class="form-control shadow-none border rounded-0">
                               </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

     <!-- modal delete product -->
     <div class="modal fade " id="modaldelete" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input required type="hidden" name="iddelete" id="iddelete">
                        <h2 class="text-center">Are you want delete?</h2>
                        <div class="modal-footer mt-2 border-0 justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        var deleteModal = document.getElementById('modaldelete');
        var deleteForm = document.getElementById('deleteForm');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var drinkId = button.getAttribute('data-id'); // Extract info from data-* attributes

            // Update the form action to include the drink ID
            deleteForm.action = `/admin/drinks/${drinkId}`;
        });

        $(document).ready(function () {
        // Open file dialog when "Upload" button clicked
        $('#editUploadBtn').on('click', function () {
            $('#editImageInput').click();
        });

        // Preview image after file is selected
        $('#editImageInput').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#editPreviewImg').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Fill modal fields when Edit button is clicked
        $('.editBtn').on('click', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const category = $(this).data('category');
            const small = $(this).data('small-price');
            const medium = $(this).data('medium-price');
            const image = $(this).data('image');

            $('#editDrink').val(name);
            $('#editCategory').val(category);
            $('#editSmallPrice').val(small);
            $('#editMediumPrice').val(medium);
            $('#editPreviewImg').attr('src', image);

            $('#editForm').attr('action', `/admin/drinks/${id}`);
        });
    });
    </script>
@endsection
