<div class="col-lg-2 rt-wrap">
    <section class="shop spad1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 rt-wrap">
                    <div class="view-more-block1">
                        <h5 class="view-text1">My Account</h5>
                        <ul class="art-links1">

                            <li><a href="{{ route('customer.dashboard')}}"><i class="fa fa-th-large"> </i> Dashboard</a></li>
                            <li><a href="{{ route('customer.profile')}}"><i class="fa fa-user-circle"> </i>Profile</a></li>
                            <li data-toggle="collapse" data-target="#work" class="collapsed">
                                <a href="#"><i class="fa fa-edit"></i> Works <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="work">
                                <li><a href="{{route('customer.work')}}">All Works</a></li>
                                <li><a href="{{ route('customer.work.add')}}">Add New Work</a></li>
                            </ul>
                            <li><a href="#"><i class="fa fa-envelope"> </i> Messages / Inbox</a></li>
                            <li><a href="{{ route('customer.orders') }}"><i class="fa fa-first-order"> </i> My Orders</a>
                            </li>
                            <li data-toggle="collapse" data-target="#service" class="collapsed">
                                <a href="#"><i class="fa fa-cog"> </i> Settings <span
                                        class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="service">
                                <li><a href="{{ route('customer.profile.edit') }}">Edit Profile</a></li>
                                <li><a href="{{ route('customer.notification') }}">Notifications</a></li>
                            </ul>
                            <li>
                                <a class="navi-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"> </i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
