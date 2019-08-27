@extends('../layouts/app')
@section('title', 'メニュー一覧')

@section('content')
	<!--ヘッダ的なやつ-->
	<div class="row">
		<div class="col-12 align-self-center">
			<nav aria-label="Page navigation example" style="margin: 0px 0px -16px 0px">
				<ul class="pagination justify-content-center">
					<li class="page-item{{ !is_null($date_before) ? "" : " disabled" }}">
						<a class="page-link" href="{{ !is_null($date_before) ? "schedule?date=".$date_before : "#" }}" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="page-item" style="text-align:center">
						<a href="#" onclick="" class="page-link" id="showDatepicker" style="width:17em">{{ $date->format('Y年n月j日') }} <i class="fa fa-calendar" aria-hidden="true"></i></a>
						<div id="datepicker"></div>
					</li>
					<li class="page-item{{ !is_null($date_after) ? "" : " disabled" }}">
						<a class="page-link" href="{{ !is_null($date_after) ? "schedule?date=".$date_after : "#" }}" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<hr color="black" style="margin:6px 0px 6px 0px">

	<script>
        $( function() {
			$.datepicker.setDefaults($.datepicker.regional["ja"]);
			$("#datepicker").hide();
			$("#showDatepicker").click(function(){
    			$("#datepicker").toggle();
			});		
            $("#datepicker").datepicker({
				dateFormat: "yy-mm-dd",
				defaultDate: "{{ $date->toDateString() }}",
				onSelect: function(selected_date){
					window.location.href = "{{ url('/schedule/') }}" + "?date=" + selected_date;
				},
			});
        } );
    </script>

	@if($menus->count() > 0)
		@foreach($menus as $menu)
			<div class="row">
				<div class="col-6">
					<div class="row">
						<div class="col-12 align-self-center">
							@switch($menu->type)
								@case('A')
									日替わりメニュー　Aセット
									@break
								@case('B')
									日替わりメニュー　Bセット
									@break
								@default
									常設メニュー
							@endswitch
						</div>
					</div>
					<div class="row">
						<div class="col-12 align-self-center">
							@switch($menu->type)
								@case('A')
									ライス・味噌汁付き
									@break
								@case('B')
									味噌汁付き
									@break
							@endswitch
						</div>
					</div>
					<div class="row">
						<div class="col-12 align-self-center">
							<p class="h4" style="margin-top: 10px"><font color="#000099">
								<u><b><a href="schedule/{{$menu->id}}">{{$menu->menu->name}}</a></b></u>
							</font></p>
						</div>
					</div>
					<div class="row">
						<div class="col-12 align-self-center">
							<?php if($menu->getMeansReputation() != NULL): ?>
								@include('partials.star', ['rate' => round($menu->getMeansReputation())])
							<?php else:?>
								まだ評価されていません
							<?php endif;?>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
						<div class="col-6 align-self-center" style="text-align:center">
							<p class="h4" style="margin-top: 10px"><b>￥{{$menu->menu->price}}</b></p>
						</div>
					</div>
					<hr style="margin: 0px 0px 0px 0px">
					<div class="row">
						<div class="col-6 align-self-center" style="text-align:center">販売状況</div>
						<div class="col-6 align-self-center" style="text-align:center">
							<p class="h4" style="margin-top: 10px">
								@if($menu->date->isToday())
									@if($menu->is_on_sale)
										<font color="green"><strong>販売中</strong></font>
									@else
										<font color="red"><strong>売り切れ</strong></font>
									@endif
								@elseif($menu->date->isFuture())
									<font color="gray">販売開始前</font>
								@else
									<font color="gray">販売終了</font>
								@endif
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr color="black" style="margin:6px 0px 6px 0px">
		@endforeach
	@else
		<div class="row">
			<div class="col-6">
				<div class="row">
					<div class="col-12 align-self-center">
						<p>メニューがありません</p>
					</div>
				</div>
			</div>
		</div>
	@endif
@endsection
