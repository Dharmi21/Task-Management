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


@endsection
