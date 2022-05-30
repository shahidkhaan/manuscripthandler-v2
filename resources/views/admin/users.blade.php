@extends('layouts.admin')

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<div class="container">
    
    <button type="button" class="btn btn-info" title="View Code" data-bs-toggle="modal" data-bs-target="#view-create-users-modal" style="margin-bottom:10px"> <b>Create Users</b></button>
    <div class="card-body">
        <div class="col-sm-3" style="margin: -68px 0px 0px 120px;">
            <input   type="text" name="email" class="form-control searchEmail" placeholder="Search for Email Only...">

        </div>
    </div>
    <br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>S.no</th>
                <th>UserType</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Password</th>
                <th>Company Name</th>
                <th>Journal</th>
                <th width="150px">Options</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>






<!-- code modal for creating new user -->


<div id="view-create-users-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="padding: 30px;">
                <h4 class="text-center"><b>Create New Users</b></h4>

                <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">


                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="*********">
                        <label for="tb-name">{{ __('Name') }}</label>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror form-input-bg" name="email" id="tb-email" value="{{ old('email') }}" required placeholder="name@example.com" autocomplete="email">
                        <label for="tb-email">Email</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control  @error('passWord') is-invalid @enderror form-input-bg" id="passWord" placeholder="*****" name="passWord" required autocomplete="passWord">
                        <label for="text-password">Password</label>

                        @error('passWord')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password-confirm" type="password" class="form-control form-input-bg" placeholder="*****" name="password_confirmation" required autocomplete="new-password">
                        <label for="text-rcpassword">Confirm Password</label>
                        <div class="invalid-feedback">
                            Password is required
                        </div>
                    </div>

                    <div class="d-flex align-items-stretch button-group">
                        <button type="submit" class="btn btn-info btn-lg px-4">Create</button>
                        <a href="javascript:void(0)" id="to-login2" class="btn btn-lg btn-light-secondary text-secondary font-weight-medium" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- code modal for edit user  -->

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="*********" value="" maxlength="50" required="">


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <textarea id="email" name="email" placeholder="Enter Email" class="form-control" required=""></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>













<!-- code for View user -->


<!-- <div class="modal fade" id="viewModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="{{ asset('assets/images/users/5.jpg')}}" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">Hanna Gover</h4>


                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>hannagover@gmail.com</h6> <small class="text-muted pt-4 db">Phone</small>
                    <h6>+91 654 784 547</h6>


                    <br />
                </div>
            </div>

        </div>
    </div>
</div> -->









<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users.index') }}",
                data: function(d) {
                    d.email = $('.searchEmail').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'userType',
                    name: 'userType'
                },
                {
                    data: 'name',
                    name: 'firstName'
                },
                {
                    data: 'email',
                    name: 'primaryEmailAddress'
                },
                {
                    data: 'password',
                    name: 'passWord'
                },
                {
                    data: 'CompanyName',
                    name: 'CompanyName'
                },

                {
                    data: 'journalName',
                    name: 'journalName'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });



        $('#createNewProduct').click(function() {
            $('#saveBtn').val("create-product");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Create New Product");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editProduct', function() {
            var product_id = $(this).data('id');
            $.get("{{ route('users.index') }}" + '/' + product_id + '/edit', function(data) {
                $('#modelHeading').html("Edit User");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            })
        });





        // $('body').on('click', '.view', function() {
        //     var product_id = $(this).data('id');
        //     $.get("#" + '/' + product_id + '/edit', function(data) {
        //         $('#modelHeading').html("Edit User");
        //         $('#saveBtn').val("edit-user");
        //         $('#viewModel').modal('show');
        //         $('#product_id').val(data.id);
        //         $('#product_id').val(data.id);
        //         $('#name').val(data.name);
        //         $('#email').val(data.email);

        //     })
        // });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('users.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteProduct', function() {

            var product_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ route('users.store') }}" + '/' + product_id,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        $(".searchEmail").keyup(function() {
            table.draw();
        });

    });
</script>

@endsection