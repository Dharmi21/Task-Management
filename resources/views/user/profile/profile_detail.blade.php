@extends('user.profile.profile')
@section('content')
    <br>
    <div class="row">
        @foreach ($employe_data as $emp_data)
            <div class="col-6">
                <div class="card">
                    <div class="card body">
                        <div class="pt-2">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Primary Details</h5>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-row-reverse">

                                        {{-- <button type="button" value="{{ $emp_data->id }}" class="btn editbtn btn-light">
                                            Edit</button> --}}
                                        <button type="button" value="{{ $emp_data->id }}" class="btn editbtn btn-light">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="font">NAME</div>
                                {{ $emp_data->name }}
                                @if ($emp_data->name == null)
                                    NULL
                                @endif

                                <div class="font pt-2">LAST NAME</div>
                                {{ $emp_data->last_name }}
                                @if ($emp_data->last_name == null)
                                    NULL
                                @endif
                                <div class="font pt-2">DATE OF BIRTH</div>
                                {{ $emp_data->date_of_birth }}
                                @if ($emp_data->date_of_birth == null)
                                    NULL
                                @endif
                                <div class="font pt-2">CITY</div>
                                {{ $emp_data->city }}
                                @if ($emp_data->city == null)
                                    NULL
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="font">MIDDLE NAME</div>
                                {{ $emp_data->middle_name }}
                                @if ($emp_data->middle_name == null)
                                    NULL
                                @endif
                                <div class="font pt-2">GENDER</div>
                                {{ $emp_data->gender }}
                                @if ($emp_data->gender == null)
                                    NULL
                                @endif
                                <div class="font pt-2">PHONE NO</div>
                                {{ $emp_data->phone_no }}
                                @if ($emp_data->phone_no == null)
                                    NULL
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <form method="POST" action="{{ route('profile_update') }}">

        @csrf
        @method('PUT')
        <div class="modal fade" id="emp_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Primary Details</h5>

                    </div>
                    <x-input type="text" hidden name="e_profile_id" id="e_profile_id"></x-input>
                    <div class="modal-body">
                        <x-input placeholder="Name" type="text" id="e_name" name="e_name" readonly></x-input>

                        <br>
                        <x-input placeholder="Middle Name" type="text" id="e_middle_name" name="e_middle_name"></x-input>

                        <br>
                        <x-input placeholder="Last Name" type="text" id="e_last_name" name="e_last_name"></x-input>

                        <br>
                        <x-dropdown id="e_gender" name='e_gender'>
                            <option value="">--Select Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </x-dropdown>
                        <br>
                        <x-input placeholder="Date Of Birth" type="date" id="e_date_of_birth"
                            name="e_date_of_birth"></x-input>

                        <br>
                        <x-input placeholder="Phone No" type="text" id="e_phone_no" name="e_phone_no"></x-input>

                        <br>
                        <x-input placeholder="City" type="text" id="e_city" name="e_city"></x-input>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <x-primary-button type="submit">Update changes</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var profile_detail = $(this).val();
                $('#emp_data').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/profile_details/" + profile_detail + "/edit",
                    success: function(response) {
                        console.log(response);
                        $('#e_name').val(response.profile.name);
                        $('#e_last_name').val(response.profile.last_name);
                        $('#e_middle_name').val(response.profile.middle_name);
                        $('#e_gender').val(response.profile.gender);
                        $('#e_date_of_birth').val(response.profile.date_of_birth);
                        $('#e_phone_no').val(response.profile.phone_no);
                        $('#e_city').val(response.profile.city);

                        $('#e_profile_id').val(profile_detail);
                    }
                });
            });
        });
    </script>
@endsection
