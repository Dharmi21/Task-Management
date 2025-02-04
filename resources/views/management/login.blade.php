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

                                <form method="POST" action="{{ route('admin_login') }}">
                                    {{-- @method('POST') --}}
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 ml-20 pb-1">
                                        <img src="/storage/Ebizz_Desktop_Page.png" alt="login form"
                                            style="border-radius: 1rem 0 0 1rem;" />
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ebizz Management Login</h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>

                                        <x-input type="text" name="email" id="email" />

                                        <x-input-error :mess="$errors->get('email')" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                        <x-input type="password" name="password" id="password" />


                                        <x-input-error :mess="$errors->get('password')" />

                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-light btn-lg btn-block" type="Submit">Login</button>
                                    </div>


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
