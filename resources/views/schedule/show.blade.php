@extends('../layouts/app')
@section('title', '詳細画面')

@section('content')
    <!--ヘッダ的なやつ-->
    <div class="row">
        <div class="col-8 align-self-center">
            <p class="h4" style="margin: 5px 0px 0px 0px">明石高専学生食堂システム</p>
        </div>
        <div class="col-4">
            <nav aria-label="Page navigation example" style="margin:0px 0px -16px 0px">
                <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">{{ $schedule->date->format('Y年n月j日') }}</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                </ul>
            </nav> 
        </div>
    </div>
    <hr color="black" style="margin:6px 0px 6px 0px">
        <a href="{{ url ('/schedule/') }}">メニュー一覧に戻る</a>
    <hr color="black" style="margin:6px 0px 6px 0px">

    <!--メニュー名や価格-->
    <div class="row">
        <div class="col-7">

        <div class="row">
            <div class="col-12 align-self-center">
                @switch($schedule->type)
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
                <p class="h4" style="margin-top: 10px"><font color="#000099"><b>{{ $schedule->menu->name }}</b></font></p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 align-self-center">
                @switch($schedule->type)
                    @case('A')
                        ライス・味噌汁付き
                        @break
                    @case('B')
                        味噌汁付き
                        @break
                @endswitch
            </div>
        </div>

        </div>
        <div class="col-3 text-center align-self-center">販売価格（税込）</div>
            <div class="col-2 text-center align-self-center">
                <h4 style="margin-top: 10px"><b>￥{{ $schedule->menu->price }}</b></h4>
            </div>
        </div>
    <hr color="black" style="margin:6px 0px 6px 0px">

    <!--栄養価表示-->
    <div class="row">
        <div class="col-12">
        <div class="row">
            <div class="col-12 align-self-center">栄養価表示</div>
        </div>
        <div class="row">
            <table align="center">
            <tr>
                <th>エネルギー</th>
                <th>タンパク質</th>
                <th>脂質</th>
                <th>塩分</th>
            </tr>
            <tr>
                <td>{{ $schedule->menu->energy }}kcal</td>
                <td>{{ $schedule->menu->protein }}g</td>
                <td>{{ $schedule->menu->lipid }}g</td>
                <td>{{ $schedule->menu->salt }}g</td>
            </tr>
            </table>
        </div>
        </div>
    </div>
    <hr color="black" style="margin:6px 0px 6px 0px">

    <!--販売状況-->
    <div class="row">
        <div class="col-4 align-self-center">販売状況</div>
            <div class="col-4 text-center align-self-center">
                <p class="h4" style="margin-top: 10px">
                    @if($schedule->date->isToday())
                        @if($schedule->is_on_sale)
                            <font color="green"><b>販売中</b></font>
                        @else
                            <font color="red"><b>売り切れ</b></font>
                        @endif
                    @elseif($schedule->date->isFuture())
                        <font color="gray"><b>販売開始前</b></font>
                    @else
                        <font color="gray"><b>販売終了</b></font>
                    @endif
                </p>
            </div>
        <div class="col-4 text-center align-self-center">
            @if($schedule->date->isToday())
                @if($schedule->is_on_sale)
                    <form style="margin-block-end: 0em" action="{{ url("/schedule/{$schedule->id}/soldout") }}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-outline-danger">売り切れにする</button>
                    </form>
                @else
                    <form style="margin-block-end: 0em" action="{{ url("/schedule/{$schedule->id}/cancel_soldout") }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-outline-success">販売中に戻す</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
    <hr color="black" style="margin:6px 0px 6px 0px">

    <!--レビュー-->
    <div class="row">
        <div class="col-12">
        <div class="row">
            <div class="col-4 align-self-center">レビュー</div>

            <div class="col-4 text-right align-self-center">平均満足度</div>
            <div class="col-4">
                @include('partials.star', ['rate' => round($schedule->getMeansReputation())])
            </div>
        </div>
        <hr style="border:none;border-top:dashed 1px #d3d3d3;height:1px;color:#FFFFFF;margin:6px 0px 6px 0px">
        
        @foreach ($schedule->menu->reviews as $review)
            <div class="row">
                <div class="col-4 align-self-center">{{ $review->author_name }}さん</div>
                <div class="col-4">
                    @include('partials.star', ['rate' => $review->reputation])
                </div>
                <div class="col-4 text-right align-self-center"><font color="gray">{{ $review->updated_at->format('Y年n月j日') }}</font></div>
            </div>
            <div class="row">
                <div class="col-12 align-self-center">
                    {{ $review->message }}
                </div>
            </div>

            <hr style="border:none;border-top:dashed 1px #d3d3d3;height:1px;color:#FFFFFF;margin:6px 0px 6px 0px">
        @endforeach

        <div class="row">
            <div class="col-8">
            <form>
            {{-- <form action="{{ url("/review/create") }}" method="post"> --}}
                <div class="form-group">
                <label for="exampleInputEmail1">名前を書く</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="名前を入力…">
                </div>
            </form>
            </div>
            <div class="col-4">
                <div class="row"><div class="col-12">満足度</div></div>
                <div class="row">
                    <div class="col-12">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <form>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">レビューを書く</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="レビューを入力…"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="float:right">レビューを投稿する</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection
