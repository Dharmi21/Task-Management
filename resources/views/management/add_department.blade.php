@extends('layouts.master_admin')

{{-- <div class="container"> --}}
@section('header')
    Add New Department
@endsection

{{-- </div> --}}



@section('body')
    <div class="d-flex flex-row-reverse">
        {{-- <div class="" --}}
        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
            New Department</button>

    </div>
    <form method="POST" action="{{ route('department.store') }}">

        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>

                    </div>
                    <div class="modal-body">
                        <x-input placeholder="Department Name" type="text" id="name" name="name"></x-input>
                        <x-input-error :mess="$errors->get('name')" />


                    </div>

                    <div class="modal-footer">
                        <x-primary-button type="submit">Save changes</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    {{-- <div class="container"> --}}
    <table class="table align-middle  bg-white ">
        <thead class="bg-light" style="line-height: 35px">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($department_id as $key => $table_department)
                <tr>
                    <td>
                        <p class="fw-normal mb-1">{{ ++$key }}</p>
                    </td>

                    <td>
                        <p class="fw-normal mb-1">{{ $table_department->name }}</p>


                    <td>
                        <button type="button" value="{{ $table_department->id }}"
                            class="btn fw-normal mb-1 editbtn btn-link btn-sm btn-rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        </button>
                    </td>
                    <td>
                        <a href="{{ url('department_delete', $table_department->id) }}" class=" fw-normal mb-1"
                            onclick="confirmation(event)"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    {{-- edit modal --}}
    <form method="POST" action="{{ route('dept_update') }}">

        @csrf
        @method('PUT')
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>

                    </div>
                    <div class="modal-body">
                        <x-input placeholder="Department Name" type="text" name="dept_id" id="dept_id"
                            hidden></x-input>
                        <x-input placeholder="Department Name" type="text" id="dept_name" name="dept_name"></x-input>
                        <x-input-error :mess="$errors->get('dept_name')" />
                    </div>
                    <div class="modal-footer">
                        <x-primary-button type="submit">Update</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var department = $(this).val();
                // alert(emp_id);
                $('#editmodal').modal('show');
                // console.log(dept_id);
                $.ajax({
                    type: "GET",
                    url: "/department/" + department+"/edit",
                    success: function(response) {
                        // console.log(response.department.name);
                        $('#dept_name').val(response.department.name);
                        $('#dept_id').val(department);


                    }
                });

            });
        });

        function confirmation(e) {
            e.preventDefault();
            var reurl = e.currentTarget.getAttribute('href');
            console.log(reurl);
            swal({
                    icon: "warning",

                    title: "are you sure want to delete this",
                    text: "you won't be able to revert this",
                    button: true,
                    dangerMode: true,
                })
                .then((willCancle) => {


                    if (willCancle) {
                        window.location.href = reurl;
                    }
                });
        }
    </script>
@endsection
