<div id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{ asset('img/da-logo.png') }}" />
        <h1>NFCQS</h1>
	</div>
    <ul class="sidebar-nav">
		@if (Auth::check())
			@if (@Auth::user()->user_type == 0)
				<li>
					<a href="{{ url('users') }}">
						<span class="menu-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
						<span class="menu-text">System Users</span>
					</a>
				</li>
			@endif
			<li>
				<a href="{{ url('commodities') }}">
					<span class="menu-icon"><i class="fa fa-list" aria-hidden="true"></i></span>
					<span class="menu-text">Commodities</span>
				</a>
			</li>
			<li>
				<a href="{{ url('commodities/add') }}" class="open-popup">
					<span class="menu-icon"><i class="fa fa-leaf" aria-hidden="true"></i></span>
					<span class="menu-text">Forecast Input</span>
				</a>
			</li>
			<li>
				<a href="{{ url('map-control') }}" class="open-popup">
					<span class="menu-icon"><i class="fa fa-map" aria-hidden="true"></i></span>
					<span class="menu-text">Map Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ url('reports/list') }}">
					<span class="menu-icon"><i class="fa fa-file" aria-hidden="true"></i></span>
					<span class="menu-text">Project Reports</span>
				</a>
			</li>
			<li>
				<a href="{{ url('reports/upload') }}" title="Upload Project Reports" class="open-popup">
					<span class="menu-icon"><i class="fas fa-file-upload"></i></span>
					<span class="menu-text">Upload Report</span>
				</a>
			</li>
			<li>
				<a href="{{ url('change-password') }}" class="open-popup">
					<span class="menu-icon"><i class="fas fa-key"></i></span>
					<span class="menu-text">New Password</span>
				</a>
			</li>
			<li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <a href="#" onclick="document.getElementById('logout-form').submit()" role="button">
                        <span class="menu-icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="menu-text">Sign Out</span>
                    </a>
                </form>
			</li>
		@endif
	</ul>
</div>
