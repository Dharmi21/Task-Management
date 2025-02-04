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

                                <form method="POST" action="{{ route('forgetpassword_post') }}">
                                    {{-- @method('POST') --}}
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 ml-20 pb-1">
                                        <img src="/storage/Ebizz_Desktop_Page.png" alt="login form"
                                            style="border-radius: 1rem 0 0 1rem;" />
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">'Forgot your password?
                                        No problem. Just let us know your email address and we will email you a password
                                        reset link that will allow you to choose a new one.</h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>

                                        <x-input type="email" name="email" id="email" required/>

                                        <x-input-error :mess="$errors->get('email')" />

                                    </div>


                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-light btn-lg btn-block" type="Submit">Send Link</button>
                                    </div>
                                    {{-- @if ($message != null) --}}
                                    {{-- <h3> {{ $message }}</h3> --}}
                                    {{-- @endif --}}

                                    {{-- </form> --}}
                                    @if (Session::get('message') != null)
                                        <div class="alert alert-success" role="alert">
                                            <h5> {{ Session::get('message') }} </h5>
                                        </div>
                                    @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>

</html>
