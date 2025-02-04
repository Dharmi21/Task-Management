@auth

        <nav class="navbar  navbar-dark nav-background sticky-top">

            <a class="navbar-brand" href="{{ route('user_home') }}">EBIZZ Employee</a>


            <form action="{{ route('u_logout') }}" method="POST">
                @csrf

                <input type="submit" class="btn nav-item text-light" value="Logout">
            </form>



        </nav>


@endauth


@include('layouts.sidebar')
