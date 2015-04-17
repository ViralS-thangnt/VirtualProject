

<ul class="pure-menu-list force-right">
	@if (\Auth::check()) 
		<li class="pure-menu-item">
			<a class="pure-menu-link">
			
				{{ \Auth::user()->kana }} ({{ getRoleNameByRoleId(\Auth::user()->role_id) }})
			
			</a>
		</li>

		@if ( \Auth::user()->role_id != ROLE_EMPLOYEE)
			<li class="pure-menu-item"><a href="{!! url(ADD_USER_PATH) !!}" class="pure-menu-link">追加</a></li>
			<li class="pure-menu-item"><a href="{!! url(SEARCH_PATH) !!}" class="pure-menu-link">検索</a></li>
		@endif

		<li class="pure-menu-item"><a href="{!! url(LOGOUT) !!}" class="pure-menu-link">ログアウト</a></li>

	@else
		<li class="pure-menu-item"><a href="{!! url(LOGIN_PATH) !!}" class="pure-menu-link">ログイン</a></li>
	@endif

	
	
</ul>