<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="#">
                <div class="d-flex flex-row align-items-center justify-content-start" style="margin-top: 35px;">
                    <div><img src="{{asset('assets/images/ticket.png')}}" alt=""></div>
                    <div><label style="color: tomato; font-size: 45px; font-weight: bold">Ticket-</label><label style="font-size: 45px; font-weight: bold">Box</label></div>
                    <div></div>
                </div>

                <label style="position: relative;left:90px;bottom: 25px;text-align: center; color: #485460; font-size: 19px;">Event Owner</label>
            </a>
        </div>
        <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="{{route('owners.index')}}"}}>Home</a></li>
                <li><a href="{{route('owners.create')}}">Create</a></li>
                <li><a href="{{route('owners.bookingList')}}">Booking List</a></li>
                <li><a href="{{route('owners.bookingCode')}}">Booking Code</a></li>
                <li><a href="{{route('owners.charts')}}">Charts</a></li>
                <li><a href="{{route('auth.logout')}}">LogOut</a></li>
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->

            <!-- User -->
            <div class="user"><a href="#"><div><img src="{{asset('assets/images/user.svg')}}" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
            <!-- Phone -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <div><div><img src="{{asset('assets/images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
                <div>Contac Us</div>
            </div>
        </div>
    </div>
</header>