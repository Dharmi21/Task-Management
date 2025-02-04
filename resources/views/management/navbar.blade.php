
    <nav class="navbar  navbar-dark nav-background sticky-top" style="background-color:rgb(0, 0, 0);">
        <a class="navbar-brand" href="{{ route('home') }}">EBIZZ Management</a>

        <form action="{{ route('admin_logout') }}" method="POST">
            @csrf

            <input type="submit" class="btn nav-item text-light" value="Logout">
        </form>


    </nav>





@include('management.sidebar')
