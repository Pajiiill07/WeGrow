<link rel="stylesheet" href="/css/header.css">
<nav id="Header">
    <a href="#" class="logo"><span>We</span>Grow</a>
    <ul class="header-item">
        <li><a href="/home">Home</a></li>
        <li><a href="/reserve">Reserve</a></li>
        <li><a href="/info">Info</a></li>
        <div class="dropdown">
            <button class="button"><span>Profile</span></button>
            <div class="dropdown-content">
                <a href="#">Your Profile</a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="button"><span>Logout</span></button>
                </form>
            </div>
        </div>
    </ul>
</nav>