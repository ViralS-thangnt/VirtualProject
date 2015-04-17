<!-- <section>
		<div class="row">
		    <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total
		    
		        <ul class="pagination pull-right">
		            
		        </ul>
		    </div>
		</div>
		
	</section> -->
<div class="col-md-4 col-sm-4 items-info" style="height: 30px; margin: 30px">
	<nav class="pure-menu pure-menu-horizontal">
		<ul class="pure-menu-list">
			{!! with(new App\Lib\Prototype\Common\CustomPaginateUser($data))->render(); !!}
		</ul>
	</nav>
</div>