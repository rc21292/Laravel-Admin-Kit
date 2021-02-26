<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
			<span class="align-middle">AdminKit</span>
		</a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>

			<li class="sidebar-item active">
				<a class="sidebar-link" href="index.html">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			@can('users_manage')
			<li class="sidebar-item">
				<a href="#auth" data-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="users"></i> <span class="align-middle">{{ trans('cruds.userManagement.title') }}</span>
				</a>
				<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.users.index')}}">{{ trans('cruds.user.title') }}</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.roles.index')}}">{{ trans('cruds.role.title') }}</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.permissions.index')}}">{{ trans('cruds.permission.title') }}</a></li>
				</ul>
			</li>
			@endcan
		</ul>

		<div class="sidebar-cta">
			<div class="sidebar-cta-content">
				<a href="#" class="btn btn-primary btn-block" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    {{ trans('global.logout') }}
                </a>
			</div>
		</div>
	</div>
</nav>