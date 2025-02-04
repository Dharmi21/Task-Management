@auth
    <nav class="navbar  navbar-dark nav-background sticky-top">

        <a class="navbar-brand" href="{{ route('user_home') }}">EBIZZ Employee</a>
        {{-- <input placeholder="Search employees or actions (Ex: Apply Leave, Attendance Approvals)"> --}}
        <form>




            <x-input placeholder="Search employees" id="search" type="text" id="search" name="search"
                style="width: 350px;height:30px" autocomplete="off"></x-input>

            <div class="text-end rounded border shadow py-3 px-4 mt-3"
                style="display:none;position:absolute;z-index:+99;background-color: #1B2531;height:256px;width:350px;overflow-y: scroll;"
                id="search_result" data-bs-auto-close="true">

                <div id="sra">
                </div>

            </div>


        </form>

        <div class="dropdown">
            <a class="btn" style="color: rgb(255, 251, 251);" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;



            <ul class="dropdown-menu"
                style="background-color:#6a7282;font-family: 'proxima-nova', sans-serif;
            font-size: 13px;
            color: rgb(188, 188, 188);">
                <li
                    style="font-family: 'proxima-nova', sans-serif;
                font-size: 13px;
                color: rgb(188, 188, 188);">

                    <a class="btn nav-item " href="{{ route('profile') }}">Profile</a>

                </li>
                <li>
                    <a class="btn nav-item " href="#">Change Password</a>
                </li>
                <li>
                    <form action="{{ route('u_logout') }}" method="POST">
                        @csrf

                        <input type="submit" class="btn nav-item " value="Logout">
                    </form>
                </li>



            </ul>
        </div>

    </nav>
@endauth
<script>

    $("#close_search").click(function() {
        $("#search_result").hide();
    });


    $("#search").keyup(function() {
        var keyword_v = $(this).val();

        $.ajax({
            Type: "GET",
            url: "/search/" + keyword_v + "/edit",

            success: function(response) {
                $("#search_result").show();
                console.log(response);
                    $('#sra').html(response.search);

            }
        });

    });
</script>


@include('user.sidebar')
