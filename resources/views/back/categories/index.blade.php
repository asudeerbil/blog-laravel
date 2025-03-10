@extends('back.layouts.master')
@section('title','All Categories')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create New Category</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.category.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Number of Articles</th>
                                <th>Transactions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->articleCount() }}</td>
                                <td>
                                    <a href="javascript:void(0);" category-id="{{ $c->id }}" class="btn btn-sm btn-primary edit-click" title="Edit Category">
                                        <i class="fa fa-edit text-white"></i>
                                    </a>
                                    <a href="javascript:void(0);" category-id="{{ $c->id }}" class="btn btn-sm btn-danger delete-click" title="Delete Category">
                                        <i class="fa fa-times text-white"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.category.update', ':category') }}" id="editCategoryForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" id="edit-category-name" class="form-control" name="name" />
                        <input type="hidden" name="id" id="category_id" />
                    </div>
                    <div class="form-group">
                        <label>Category Slug</label>
                        <input type="text" id="edit-slug-name" class="form-control" name="slug" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
                <form method="post" action="{{ route('admin.category.destroy', ':category') }}" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="delete-category-id" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.edit-click').click(function() {
            var id = $(this).attr('category-id');
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.category.show', ':category') }}'.replace(':category', id),

                success: function(data) {
                    $('#edit-category-name').val(data.name);
                    $('#edit-slug-name').val(data.slug ?? data.name.toLowerCase());
                    $('#category_id').val(data.id);
                    var updateRoute = '{{ route('admin.category.update', ':category') }}'.replace(':category', data.id); 
                    $('#editCategoryForm').attr('action', updateRoute);
                    $('#editModal').modal('show');
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        });

        $('.delete-click').click(function() {
            var id = $(this).attr('category-id');
            var deleteRoute = '{{ route('admin.category.destroy', ':category') }}'.replace(':category', id); 
            $('#deleteCategoryForm').attr('action', deleteRoute);
            $('#delete-category-id').val(id);
            $('#deleteModal').modal('show');
        });

        $('#confirmDelete').click(function() {
            $('#deleteCategoryForm').submit();
        });
    });
</script>
@endsection