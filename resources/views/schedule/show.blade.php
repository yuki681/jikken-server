@extends('../layouts/app')
@section('title', '詳細画面')

@section('content')

    @if(session('success'))
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if(session('failed'))
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="alert alert-danger" role="alert">
                    {{ session('failed') }}
                </div>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="alert alert-danger" role="alert">
                    レビューの投稿に失敗しました。
                </div>
            </div>
        </div>
    @endif
    
    <!--ヘッダ的なやつ-->
    <div class="row">
        {{-- <div class="col-8 align-self-center">
            <!-- <p class="h4" style="margin: 5px 0px 0px 0px">明石高専学生食堂システム</p> -->
        </div> --}}
        <div class="col-12 align-self-cente">
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
    {{-- <hr color="black" style="margin:6px 0px 6px 0px"> --}}
    <a href="{{ url ('/schedule/?date=' . $schedule->date->toDateString()) }}">メニュー一覧に戻る</a>
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
                @if(!is_null($schedule->getMeansReputation()))
                    @include('partials.star', ['rate' => round($schedule->getMeansReputation())])
                @else
                    まだ評価されていません
                @endif
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

        <form action="{{ url('/schedule/' . $schedule->id . '/review/create') }}" method="post">
            {{ csrf_field() }}
            <input name="menu_id" type="hidden" value="{{ $schedule->menu_id }}">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="inputAuthorName">名前を書く</label>
                            <input type="text" id="inputAuthorName" name="author_name" placeholder="名前を入力…" value="{{ old('author_name') }}"
                                class="form-control{{$errors->has('author_name')?" is-invalid":""}}" >
                            @if($errors->has('author_name'))
                                <div class="invalid-feedback">{{ $errors->first('author_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row"><div class="col-12">満足度（選択）</div></div>
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="reputation" value="5" {{ old('reputation') == 5 ? 'checked' : '' }}/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4" name="reputation" value="4" {{ old('reputation') == 4 ? 'checked' : '' }}/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3" name="reputation" value="3" {{ old('reputation') == 3 ? 'checked' : '' }}/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2" name="reputation" value="2" {{ old('reputation') == 2 ? 'checked' : '' }}/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1" name="reputation" value="1" {{ old('reputation') == 1 ? 'checked' : '' }}/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                </fieldset>
                            </div>
                            @if($errors->has('reputation'))
                                <div class="col-12">
                                    <span style="font-size:80%"><font color="#dc3545">{{ $errors->first('reputation') }}</font></span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">レビューを書く</label>
                            <textarea name="message" class="form-control{{$errors->has('message')?" is-invalid":""}}" rows="4" placeholder="レビューを入力…">{{ old('message') }}</textarea>
                            @if($errors->has('message'))
                                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right">レビューを投稿する</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
