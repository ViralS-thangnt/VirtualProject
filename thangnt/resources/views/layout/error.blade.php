@if($errors->has())
<section>
	<section class="error-box">
		<h3>!!ERROR!!</h3>
		<ul>
		@foreach($errors->all() as $error)
		
			{{ $error }} </br>
		
		@endforeach
		</ul>
	</section>
	
</section>
@endif	
	
@if(Session::has('msg_response'))
	{{ Session::get('msg_response') }}
@endif
