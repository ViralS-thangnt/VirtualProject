@extends('layout.master')

@section('header-items')
	<ul class="pure-menu-list force-right">
			

			
		<li class="pure-menu-item">
			
		</li>
		
	</ul>
@stop

@section('content')
@include('layout.error')
<div width="700px">
<h2>ログイン</h2>
	<section>
		<form class="pure-form" method="POST" action="{!! url(LOGIN_PATH) !!}">
			<fieldset class="pure-group">
				<input type="text" name="email" class="pure-input-1-4 required" placeholder="メールアドレス">
				
				{{checkLabelError('email', $errors)}}

				<input type="password" name="password" class="pure-input-1-4 required" placeholder="パスワード">
				{{checkLabelError('password', $errors)}}
				
				
			</fieldset>
			<button type="submit" class="pure-button pure-input-1-4 pure-button-primary">ログイン</button>
			<input type="hidden" name="_method" value="POST">
    		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</section>

</div>

@stop

