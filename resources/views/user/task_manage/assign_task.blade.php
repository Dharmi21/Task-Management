@extends('layouts.master_user')

@section('header')
    <a href="{{ route('task_data.index') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">TASK</a>
    {{-- @foreach ($data as $role) --}}
    @if ($data->role == 1)
        <a href="{{ route('task.index') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">ASSIGN TASK</a>
    @endif
    {{-- @endforeach --}}
@endsection

@section('body')
    <h3>Assign New Task</h3>
    <div class="d-flex flex-row-reverse">
        {{-- <div class="" --}}

        {{-- @foreach ($data as $role) --}}
        @if ($data->role == 1)
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Assign
                New Task</button>
        @endif
        {{-- @endforeach --}}

        {{-- @foreach ($employee_id as $employee)
      {{$employee['name']}}
    @endforeach --}}
        <form method="POST" action="{{ route('task.store') }}">

            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Assign
                                New Task</h5>

                        </div>
                        <div class="modal-body">
                            <x-dropdown id="employee" name='employee'>
                                <option value="">--Select Employee--</option>

                                @foreach ($employee_id as $employee)
                                    <option value={{ $employee['id'] }}>{{ $employee['name'] }}</option>
                                @endforeach

                            </x-dropdown>
                            <x-input-error :mess="$errors->get('employee')" />
                            <br>

                            <x-input placeholder="Task Name" type="text" id="task_name" name="task_name"></x-input>
                            <x-input-error :mess="$errors->get('name')" />
                            <br>

                            <textarea placeholder="Description" class="form-control" id="description" name="description"></textarea>
                            <x-input-error :mess="$errors->get('description')" />
                            <br>

                            <x-input placeholder="Due Date" type="date" id="due_date" name="due_date"></x-input>
                            <x-input-error :mess="$errors->get('due_date')" />





                        </div>

                        <div class="modal-footer">
                            <x-primary-button type="submit">Save changes</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="container">

        <table class="table align-middle  bg-white ">
            <thead class="bg-light" style="line-height: 35px">
                <tr>
                    <th>No</th>
                    <th>Assign By</th>
                    <th>Assign To</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Due Date</th>
                    <th>Assign Date</th>
                    <th>Status</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($task_data as $key => $data)
                    <tr>
                        <td>
                            <p class="fw-normal mb-1">{{ ++$key }}</p>
                            <input type="text" id="task_id" name="task_id" hidden value="{{ $data->id }}" />

                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->manager->name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->employee->name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->task }}</p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1">{{ $data->description }}</p>

                        </td>
                        <td>

                            @if ($data->task_file == null)
                                <p>None</p>
                                {{-- <p class="fw-normal mb-1"><input id="file_upload" name="file_upload" type="file" /></p> --}}
                            @else
                                <p class="fw-normal mb-1"><a target="_blank"
                                        href="/storage/{{ $data->task_file }}">File</a></p>
                            @endif


                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->due_date }}</p>

                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->created_at->format('y-m-d') }}</p>

                        </td>
                        <td>
                            @if ($data->status == 0)
                                <button type="submit" class="btn btn-dark">Pending</button>
                            @else
                                <button class="btn btn-dark">Submitted</button>
                            @endif
                        </td>
                        <td>
                            @if ($data->status == 0)
                                <button type="submit" value="{{ $data->id }}" class="btn btn-dark upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- </form> --}}
        <form method="POST" action="{{ route('task_update') }}">
            @csrf
            @method('patch')

            <div class="modal fade" id="task_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Task Details</h5>

                        </div>
                        <div class="modal-body">
                            <x-input hidden type="text" id="id" name="id"></x-input>
                            <x-dropdown id="up_employee" name='up_employee'>
                                <option value="">--Select Employee--</option>

                                @foreach ($employee_id as $employee)
                                    <option value={{ $employee['id'] }}>{{ $employee['name'] }}</option>
                                @endforeach

                            </x-dropdown>
                            <x-input-error :mess="$errors->get('employee')" />
                            <br>

                            <x-input placeholder="Task Name" type="text" id="up_task_name"
                                name="up_task_name"></x-input>
                            <x-input-error :mess="$errors->get('name')" />
                            <br>

                            <textarea placeholder="Description" class="form-control" id="up_description" name="up_description"></textarea>
                            <x-input-error :mess="$errors->get('description')" />
                            <br>

                            <x-input placeholder="Due Date" type="date" id="up_due_date"
                                name="up_due_date"></x-input>
                            <x-input-error :mess="$errors->get('due_date')" />





                        </div>


                        <div class="modal-footer">
                            <x-primary-button type="submit">Save changes</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.upload', function() {
                var id = $(this).val();
                $('#task_details').modal('show');
                // console.log(id);
                $.ajax({
                    type: "GET",
                    url: "/task/" + id + "/edit",
                    success: function(response) {
                        $('#up_employee').val(response.task_id.emp_id);
                        $('#up_task_name').val(response.task_id.task);
                        $('#up_description').val(response.task_id.description);
                        $('#up_due_date').val(response.task_id.due_date);


                        $('#id').val(id);

                    }
                });

            });
        });
    </script>
    @yield('content')
@endsection
