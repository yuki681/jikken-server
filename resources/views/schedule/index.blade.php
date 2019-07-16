@extends('../layouts/app')
@section('title', 'メニュー一覧')

@section('content')
	<!--ヘッダ的なやつ-->
	<div class="row">
		<div class="col-8 align-self-center">
			<p class="h4" style="margin: 5px 0px 0px 0px">明石高専学生食堂システム</p>
		</div>
		<div class="col-4">
			<nav aria-label="Page navigation example" style="margin: 0px 0px -16px 0px">
				<ul class="pagination justify-content-center">
				<li class="page-item">
					@if(!is_null($date_before))
						<a class="page-link" href="/schedule?date={{$date_before}}" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					@else
						<a class="page-link" href="#" aria-label="Previous" aria-disabled="true">
							<span aria-hidden="true">&laquo;</span>
						</a>
					@endif
				</li>
				<li class="page-item"><a class="page-link" href="#">{{ $date->format('Y年n月j日') }}</a></li>
				<li class="page-item">
					@if(!is_null($date_after))
						<a class="page-link" href="/schedule?date={{$date_after}}" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					@else
						<a class="page-link" href="#" aria-label="Next" aria-disabled="true">
							<span aria-hidden="true">&raquo;</span>
						</a>
					@endif
				</li>
				</ul>
			</nav> 
		</div>
	</div>
	<hr color="black" style="margin:6px 0px 6px 0px">

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
							
							<div class="rating">
								<?php if($menu->getMeansReputation() != NULL): ?>
									<?php for($i = 5; $i > 0; $i--):?>
										<?php if(round($menu->getMeansReputation()) >= $i):?>
											<label style="color:#FFD700"></label>
										<?php else:?>
											<label style="color:#ddd"></label>
										<?php endif;?>
									<?php endfor; ?>
								<?php else:?>
									まだ評価されていません
								<?php endif;?>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="row h-50">
						<div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
						<div class="col-6 align-self-center" style="text-align:center">
							<p class="h4" style="margin-top: 10px"><b>￥{{$menu->menu->price}}</b></p>
						</div>
					</div>
					<hr style="margin: 0px 0px 0px 0px">
					<div class="row h-50">
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
	<hr color="black" style="margin:6px 0px 6px 0px">
@endsection
