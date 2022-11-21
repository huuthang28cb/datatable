<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Doctor</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.css">
</head>
<body>
    <div class="container mt-5">
        <button class="btn btn-success pull-right create"><i class="glyphicon glyphicon-plus"></i> Create</button>
        <table class="table yajra-datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    {{-- model create --}}
    <div id="modalAdd" class="modal zoom" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="store">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="studname">Name</label>
                            <input type="text" class="form-control name" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="studname">Email</label>
                            <input type="text" class="form-control email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="studname">Phone</label>
                            <input type="text" class="form-control phone" name="phone" placeholder="Enter phone" required>
                        </div>
                        <div class="form-group">
                            <label for="studname">Address</label>
                            <input type="text" class="form-control address" name="address" placeholder="Enter address" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    {{-- model edit --}}
    <div id="modalEdit" class="modal zoom" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="update">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="studname">Name</label>
                            <input type="text" class="form-control name" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="studname">Email</label>
                            <input type="text" class="form-control email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="studname">Phone</label>
                            <input type="text" class="form-control phone" name="phone" placeholder="Enter phone" required>
                        </div>
                        <div class="form-group">
                            <label for="studname">Address</label>
                            <input type="text" class="form-control address" name="address" placeholder="Enter address" required>
                        </div>                        
                        <input hidden type="text" class="form-control id" name="id" placeholder="Enter address">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
    
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: route('doctors.list'),
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: true
                },
            ]
        });
    
    });
    // create
    $(document).on('click', '.create', function (e) {
        e.preventDefault();
        // cleaner();
        $('#modalAdd').modal('show');
        $('.modal-title').text('Create Doctor');
    });
    //store
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')}
    });
    $(document).on('submit', '#modalAdd', function (e) {
        e.preventDefault(); // ngăn chặn xử lý mặc định của trình duyệt
        var formData = $("form#store").serializeArray();
        var data = {
            _token: "{{ csrf_token() }}",
            name: formData[1].value,
            email: formData[2].value,
            phone: formData[3].value,
            address: formData[4].value,
        };
        // console.log(data);
        
        $.ajax({
            url: route('doctors.store'),
            method: 'POST',
            data: data,
            success: function (result) {
                if (result.success) {
                    // refresh();
                    $('#modalAdd').modal('hide');
                    swal(
                        'Good job!',
                        'Successfull Saved!',
                        'success'
                    );
                }
                
            }
        });
    });

    //edit
    $(document).on('click', '.edit', function (e) {
        e.preventDefault();
        var id_doctor = $(this).data('id');
        // console.log(id_doctor);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')}
        });
        $.ajax({
            url: route('doctors.edit', { id: id_doctor }),
            method: 'GET',
            success: function (result) {
                
                if (result.success) {
                    let json = jQuery.parseJSON(result.data);
                    // console.log(json);
                    $('.id').val(json.id);
                    $('.name').val(json.name);
                    $('.email').val(json.email);
                    $('.phone').val(json.phone);
                    $('.address').val(json.address);
                    $('#modalEdit').modal('show');
                    $('.modal-title').text('Update doctor');
                }
            }
        });
    });

    function refresh() {
        var table = $('.yajra-datatable').DataTable();
        table.ajax.reload(null, false);
        console.log('refresh success');
    }
    function cleaner() {
        $('.id').val('');
        $('.name').val('');
        $('.email').val('');
        $('.phone').val('');
        $('.address').val('');
        console.log('cleaner success');
    }
    //update
    $(document).on('submit', '#modalEdit', function (e) {
        e.preventDefault();
        var formData = $("form#update").serializeArray();
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')}
        });
        var id_doctor = formData[4].value
        // console.log(id_doctor);
        var data = {
            _token: "{{ csrf_token() }}",
            name: formData[0].value,
            email: formData[1].value,
            phone: formData[2].value,
            address: formData[3].value,
        };
        // console.log(data);
        $.ajax({
            url: route('doctors.update', { id: id_doctor }),
            method: 'PUT',
            data: data,
            success: function (result) {
                if (result.success) {
                    refresh();
                    cleaner();
                    console.log('ajax call made');
                    $('#modalEdit').modal('hide');
                    swal(
                        'Updated!',
                        'Successfull Update!',
                        'success'
                    );
                    console.log('success update');
                }
                else{
                    console.log('failed');
                }
            }
        });
    });
    //delete data
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var id_doctor = $(this).data('id');
        var data = {
            _token: "{{ csrf_token() }}",
        };
        swal({
            title: 'Are you sure?',
            text: "you want to remove this record?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')}
                });
                $.ajax({
                    url: route('doctors.delete', { id: id_doctor }),
                    method: 'DELETE',
                    data: data,
                    success: function (result) {
                        if (result.success) {
                            refresh();
                            cleaner();
                            swal(
                                'Deleted!',
                                'Successfull Deleted!',
                                'success'
                            );
                        }
                    }
                });
            }
        });
    });

</script>
</html>