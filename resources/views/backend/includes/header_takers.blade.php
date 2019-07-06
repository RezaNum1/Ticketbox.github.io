<!-- Search -->
<div class="menu_search">
    <form action="#" id="menu_search_form" class="menu_search_form">
        <input type="text" class="search_input" placeholder="Search Item" required="required">
        <button class="menu_search_button"><img src="{{asset('assets/images/search.png')}}" alt=""></button>
    </form>
</div>
<!-- Navigation -->
<div class="menu_nav">
    <ul>
        <li><a href="{{route('takers.index')}}"}}>Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="{{route('auth.logout')}}">LogOut</a></li>

    </ul>
</div>
<!-- Contact Info -->
<div class="menu_contact">
    <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
        <div>{{''}}</div>
    </div>
    <div class="menu_social">
        <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</div>
