@extends('layouts.master_user')


@section('header')
    <a href="{{ route('user_home') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">DASHBOARD</a>
    <a href="{{ route('user_welcome') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">WELCOME</a>
@endsection

{{-- <div class="main"> --}}

@section('body')
    <div class="row">
        <div class="col-10">
            <div class="col">
                @foreach ($employe_data as $emp_data)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="profile-picture-container ">
                                    <img class="profile-picture" height="100" width="100"
                                        src="/storage/{{ $emp_data['profile_photo'] }}"><!----><!---->

                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="ml-20 z-index-0">
                                    <div class="d-flex">
                                        <h5 class="card-title text-uppercase"> {{ $emp_data->name }}
                                        </h5>
                                        &nbsp;&nbsp;
                                        <a href="{{ route('profile') }}" style="text-decoration: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                                <path fill-rule="evenodd"
                                                    d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        <p class="card-title  "> {{ $emp_data['job_title'] }}<svg
                                                xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                            </svg>{{ $emp_data['city'] }} </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <br>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font">Special title treatment</h5>
                        <p class="card-text font ">With supporting text below as a natural lead-in to
                            additional
                            content.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font">Special title treatment</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to
                            additional
                            content.</p>
                    </div>
                </div>

            </div>
            <br>
            <div class="col">
                <div class="card">
                    @foreach ($hrdata as $data)
                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">We're here to assist you</h5>

                        <div class="d-flex">
                            <img src="/storage/{{ $data['profile_photo'] }}" alt="Avatar"
                                style="width:60px; border-radius: 50%;">
                            &nbsp; &nbsp;

                            <div>
                                <a href="/employee_summary/{{$data->id}}" style="text-decoration:none">{{ $data->name }} {{ $data['last_name'] }}</a>
                                <p>{{ $data['job_title'] }} Manager</p>
                            </div>

                        </div>
                        <div>

                        </div>
                        <br>
                        <div class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-telephone" viewBox="0 0 16 16">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg> &nbsp;&nbsp;&nbsp;
                            <p class="card-text">{{ $data['phone_no'] }}</p>
                        </div>
                        <br>
                        <div class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg> &nbsp;&nbsp;&nbsp;
                            <a class="text-break"
                                href="mailto:{{ $data->email }}">{{ $data->email }}</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
