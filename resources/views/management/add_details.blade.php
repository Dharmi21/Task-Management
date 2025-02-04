@extends('layouts.master_admin')


{{-- <div class="container"> --}}
@section('header')
    Add Details Of New Employee
@endsection

{{-- </div> --}}


@section('body')
    <br>
    <div class="d-flex flex-row-reverse">

        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
            Details</button>
    </div>
    {{-- INSERT FORM --}}
    <form method="POST" action="{{ route('employee.store') }}">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Details Of New Employee</h5>

                    </div>
                    <div class="modal-body">

                        <x-input placeholder="Enter Name Employee" type="text" name="name" id="name"></x-input>
                        <x-input-error :mess="$errors->get('name')" />

                        <br>
                        <x-input placeholder="Enter Email Of Employee" type="text" name="email"
                            id="email"></x-input>
                        <x-input-error :mess="$errors->get('email')" />
                        <x-input id="password" name="password" type="password" value="12345" hidden></x-input>

                        <br>

                        <x-dropdown id='department' name='department'>
                            <option value="">--Select Department--</option>

                            @foreach ($dept as $department)
                                <option value={{ $department['id'] }}>{{ $department['name'] }}</option>
                            @endforeach


                        </x-dropdown>

                        <x-input-error :mess="$errors->get('department')" />
                        <br>
                        <x-dropdown id="manager" name='manager'>
                            <option value="">--Select Reporting Manager--</option>

                            @foreach ($manager_id as $manager)
                                <option value={{ $manager['name'] }}>{{ $manager['name'] }}</option>
                            @endforeach

                        </x-dropdown>
                        <x-input-error :mess="$errors->get('manager')" />
                        <br>
                        <x-input placeholder="Add Job Title" id='job' name='job'></x-input>
                        <x-input-error :mess="$errors->get('job')" />


                    </div>

                    <div class="modal-footer">
                        <x-primary-button type="submit">Save changes</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    {{-- DATA TABLE --}}

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light" style="line-height: 35px">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Department</th>
                <th>Reporting Manager </th>
                <th>Phone No</th>
                <th>City</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Action</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($employee_id as $key => $table_details)
                <tr>
                    <td>
                        <p class="fw-normal mb-1">{{ ++$key }}</p>
                    </td>

                    <td>
                        <div class="d-flex align-items-center">
                            <img src="/storage/{{ $table_details->profile_photo }}" alt=""
                                style="width: 45px; height: 45px" class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $table_details->name }}
                                    {{ $table_details->middle_name }} {{ $table_details->last_name }}</p>
                                <p class="fw-normal mb-1">{{ $table_details->email }}</p>

                            </div>
                        </div>
                    </td>

                    <td>
                        <p class="fw-normal mb-1">{{ $table_details->job_title }}</p>

                    </td>

                    <td>
                        {{-- <p class="fw-normal mb-1">{{ $table_details->dept->name }}</p> --}}

                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $table_details->reporting_manager }}</p>

                    </td>

                    <td>
                        @if ($table_details->phone_no == null)
                            <p class="fw-normal mb-1">None</p>
                        @else
                            <p class="fw-normal mb-1">{{ $table_details->phone_no }}</p>
                        @endif

                    </td>
                    <td>
                        @if ($table_details->city == null)
                            <p class="fw-normal mb-1">None</p>
                        @else
                            <p class="fw-normal mb-1">{{ $table_details->city }}</p>
                        @endif

                    </td>

                    <td>
                        @if ($table_details->date_of_birth == null)
                            <p class="fw-normal mb-1">None</p>
                        @else
                            <p class="fw-normal mb-1">{{ $table_details->date_of_birth }}</p>
                        @endif

                    </td>
                    <td>
                        @if ($table_details->gender == null)
                            <p class="fw-normal mb-1">None</p>
                        @else
                            <p class="fw-normal mb-1">{{ $table_details->gender }}</p>
                        @endif

                    </td>
                    <td>
                        <button type="button" value="{{ $table_details->id }}"
                            class="btn editbtn btn-link btn-sm btn-rounded">
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
                        <a href="{{ url('details_delete', $table_details->id) }}" class=" fw-normal mb-1"
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

    {{-- Edit modal --}}
    <form method="POST" action="{{ route('details_update') }}">
        @csrf
        @method('PUT')

        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Details Of New Employee</h5>

                    </div>
                    <div class="modal-body">
                        <x-input type="text" hidden name="emp_id" id="emp_id"></x-input>
                        <x-dropdown id="emp" name='emp'>
                            <option value="">--Select Employee--</option>

                            @foreach ($employee_id as $employee)
                                <option value={{ $employee['id'] }}>{{ $employee['name'] }}</option>
                            @endforeach

                        </x-dropdown>
                        <x-input-error :mess="$errors->get('emp')" />


                        <br>

                        <x-dropdown id='dept' name='dept'>
                            <option value="">--Select Department--</option>

                            @foreach ($dept as $department)
                                <option value={{ $department['id'] }}>{{ $department['name'] }}</option>
                            @endforeach


                        </x-dropdown>

                        <x-input-error :mess="$errors->get('dept')" />
                        <br>
                        <x-dropdown id="rp_manager" name='rp_manager'>
                            <option value="">--Select Reporting Manager--</option>

                            @foreach ($manager_id as $manager)
                                <option value={{ $manager['id'] }}>{{ $manager['name'] }}</option>
                            @endforeach

                        </x-dropdown>
                        <x-input-error :mess="$errors->get('rp_manager')" />
                        <br>
                        <x-input placeholder="Add Job Title" id='job_title' name='job_title'></x-input>
                        <x-input-error :mess="$errors->get('job_title')" />


                    </div>

                    <div class="modal-footer">
                        <x-primary-button type="submit">Save changes</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var detail = $(this).val();
                $('#editmodal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/details/" + detail + "/edit",
                    success: function(response) {
                        // console.log(response.department.name);
                        $('#emp').val(response.details.employee);
                        $('#dept').val(response.details.department);
                        $('#rp_manager').val(response.details.reporting_manager);
                        $('#job_title').val(response.details.job_title);
                        $('#emp_id').val(detail);


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
