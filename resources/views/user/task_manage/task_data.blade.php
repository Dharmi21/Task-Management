@extends('layouts.master_user')

@section('header')
    <a href="{{ route('task_data.index') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">TASK</a>
    @foreach ($data as $role)
        @if ($role['role'] == 1)
            <a href="{{ route('task.index') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">ASSIGN TASK</a>
        @endif
    @endforeach
@endsection

@section('body')

<h3>Task Data</h3>


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

                        @if ($data->task_file== null)
                            <p>None</p>
                            {{-- <p class="fw-normal mb-1"><input id="file_upload" name="file_upload" type="file" /></p> --}}
                        @else
                            <p class="fw-normal mb-1"><a target="_blank" href="/storage/{{ $data->task_file }}">File</a></p>
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
                            <button type="submit" value="{{ $data->id }}"
                                class="btn btn-dark upload">Upload</button>
                        @else
                            <button class="btn btn-dark">Submitted</button>
                        @endif
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <form method="POST" action="{{ route('upload_file') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="modal fade" id="task_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="id" name="id" />
                        <input type="text" id="task" name="task" />
                        <p class="fw-normal mb-1"><input id="file_upload" name="file_upload" type="file" /></p>
                        <x-input-error :mess="$errors->get('file_upload')" />

                        {{-- <p id="task" name="task"></p> --}}
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
            $(document).on('click', '.upload', function() {
                var id = $(this).val();
                $('#task_details').modal('show');
                // console.log(id);
                $.ajax({
                    type: "GET",
                    url: "/task_data/" + id + "/edit",
                    success: function(response) {
                        $('#task').val(response.task_id.task);
                        $('#id').val(id);

                    }
                });

            });
        });
    </script>
    @yield('content')
@endsection
