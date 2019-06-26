<!--<html>
    <body>
        <p>{{$menu['name']}}</p>
    </body>
</html>
--> 

@extends('../layouts/app')
@section('title', '詳細画面')

@section('content')
    <!--ヘッダ的なやつ-->
    <div class="row">
        <div class="col-8 align-self-center">
        <h4>明石高専学生食堂システム</h4>
        </div>
        <div class="col-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2019年6月12日</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            </ul>
        </nav> 
        </div>
    </div>
    <hr>
    <a href="file:///home1/home-e/e1511/%E3%83%87%E3%82%B9%E3%82%AF%E3%83%88%E3%83%83%E3%83%97/jikken-server/markup/list.html">メニュー一覧に戻る</a>
    <hr>
    <!--メニュー名や価格-->
    <div class="row">
        <div class="col-7">
        <div class="row">
            <div class="col-12 align-self-center">日替わりメニュー　Aセット</div>
        </div>
        <div class="row">
            <div class="col-12 align-self-center">
            <p class="h4"><font color="#000099"><b>アジフライおろしポン酢</b></font></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 align-self-center">ライス・味噌汁付き</div>
        </div>
        </div>
        <div class="col-3 text-center align-self-center">販売価格（税込）</div>
        <div class="col-2 text-center align-self-center"><h4><b>￥420</b></h4></div>
    </div>
    <hr>
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
                <td>725kcal</td>
                <td>25.0g</td>
                <td>19.4g</td>
                <td>3.7g</td>
            </tr>
            </table>
        </div>
        </div>
    </div>
    <hr>     
    <!--販売状況-->
    <div class="row">
        <div class="col-4 align-self-center">販売状況</div>
        <div class="col-4 text-center align-self-center">
        <p class="h4"><font color="green"><b>販売中</b></font></p>
        </div>
        <div class="col-4 text-center align-self-center">
        <button type="button" class="btn btn-outline-danger">売り切れにする</button>
        </div>
    </div>
    <hr>
    <!--レビュー-->
    <div class="row">
        <div class="col-12">
        <div class="row">
            <div class="col-6 align-self-center">レビュー</div>
            <div class="col-6 text-center align-self-center">平均満足度：★★★★★</div>
        </div>
        <hr style="border:none;border-top:dashed 1px #d3d3d3;height:1px;color:#FFFFFF;">
        
        <div class="row">
            <div class="col-8 align-self-center">明石　太郎さんの満足度：★★★★★</div>
            <div class="col-4 text-right align-self-center"><font color="gray">2019年2月3日</font></div>
        </div>
        <div class="row">
            <div class="col-12 align-self-center">
            美味しかったです。この価格でこのボリュームはお得だと思います。
            </div>
        </div>

        <hr style="border:none;border-top:dashed 1px #d3d3d3;height:1px;color:#FFFFFF;">
        <div class="row">
            <div class="col-8">
            <form>
                <div class="form-group">
                <label for="exampleInputEmail1">名前を書く</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="名前を入力…">
                </div>
            </form>
            </div>
            <div class="col-4 align-self-center">
            <p>満足度（選択できるようにする）</p>
            <p style="text-align: center">☆☆☆☆☆</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <form>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">レビューを書く</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4">レビューを入力…</textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="float:right">レビューを投稿する</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection