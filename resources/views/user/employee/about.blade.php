@extends('layouts.master_user')

@section('header')
    <a href="#" type="button" style="color: rgb(188, 187, 187)" class="btn">Employee Summary</a>
@endsection

@section('body')
    @foreach ($emp_data as $id)
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <img src="/storage/{{ $id['profile_photo'] }}" class="profile" height="200" width="215">

                    </div>

                    <div class="col-10">
                        <h4 class="card-title">{{ $id->name }}</h4>

                        <div class="d-flex">
                            <div class="col-sm-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                {{ $id['city'] }}
                            </div>
                            <div class="col-sm-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                {{ $id['phone_no'] }}
                            </div>
                            <div class="col-sm-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg>
                                <a class="text-break" style="text-decoration: none"
                                    href="mailto:{{ $id->email }}">{{ $id->email }}</a>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex">
                            <div class="col-sm-2 font">JOB TITLE</div>
                            <div class="col-sm-2 font">DEPARTMENT</div>
                            <div class="col-sm-2 font">REPORTING TO</div>
                            <div class="col-sm-1 font">EMP NO</div>
                        </div>
                        <div class="d-flex">
                            <div class="col-sm-2">{{ $id['job_title'] }}</div>
                            <div class="col-sm-2">{{ $id->dept->name }}</div>
                            <div class="col-sm-2"><a href="/employee_summary/{{ $id->reporting_manager }}"
                                    style="text-decoration: none">{{ $id->manager->name }}</a></div>
                            <div class="col-sm-1">{{ $id->id }}</div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <br>

    <div class="row">
        @foreach ($emp_data as $emp_data)
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
    </div>




    @yield('content')
@endsection
