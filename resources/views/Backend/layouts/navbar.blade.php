<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="javascript:void(0)" role="button"> <i
                        class="bi bi-list"></i> </a>
            </li>
            <li class="nav-item d-none d-md-block"> <a href="{{ route('admin.dashboard') }}"
                    class="nav-link">Dashboard</a> </li>

            <li class="nav-item dropdown">
                <form action="{{ route('selectedSite') }}" method="post" id="website_active_from">
                    @csrf
                    <select name="website_id" class="form-control" id=""
                        onchange="website_active_from.submit()">
                        @foreach ($navbarData as $site)
                            <option value="{{ $site->id }}"
                                {{ $site->id == $website_active_id?->user_website_active ? 'selected' : '' }}>
                                {{ $site->site_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="add_web_button border nav-link" href="{{ route('website.create') }}">
                    <i class="bi bi-plus"></i>
                    <span>Add Website</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png"
                        class="user-image rounded-circle shadow" alt="User Image">
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" class="rounded-circle shadow"
                            alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
