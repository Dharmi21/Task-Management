{{-- <h1>Password Page</h1> --}}


{{-- <input type="text" name="token" value="{{$token}}"> --}}
{{-- <input type="text" name="token" value="{{ $email['email'] }}"> --}}
{{-- @foreach ($token as $data)
    {{$data}}
@endforeach --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>

<body>
    <section class="vh-100" style="background-color:white;">
        <div class="container py5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="background-color:black;">
                        <div class="row g-0">

                            {{-- <div class="col-md-6 col-lg-7 d-flex align-items-center"> --}}
                            <div class="card-body p-4 p-lg-5 text-light">

                                <form method="POST" action="{{route('reset_password.post')}}">
                                    {{-- @method('POST') --}}
                                    @method('PUT')

                                    @csrf

                                    <div class="d-flex align-items-center mb-3 ml-20 pb-1">
                                        <img src="/storage/Ebizz_Desktop_Page.png" alt="login form"
                                            style="border-radius: 1rem 0 0 1rem;" />
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset Password</h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>
                                        @foreach ($data as $email)
                                            <x-input type="text" name="email" id="email"
                                                value="{{ $email['email'] }}" readonly/>
                                        @endforeach

                                        {{-- <x-input type="email" name="email" id="email" /> --}}

                                        <x-input-error :mess="$errors->get('email')" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">New Password</label>
                                        <x-input type="password" name="password" id="password" />


                                        <x-input-error :mess="$errors->get('password')" />

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Conform Password</label>
                                        <x-input type="password" name="conform_password" id="conform_password" />


                                        <x-input-error :mess="$errors->get('conform_password')" />

                                    </div>


                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-light btn-lg btn-block" type="Submit">Reset</button>
                                    </div>
                                    @if (Session::get('error') != null)
                                        <div class="alert alert-danger" role="alert">
                                            <h5> {{ Session::get('error') }} </h5>
                                        </div>
                                    @endif


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>

</html>
