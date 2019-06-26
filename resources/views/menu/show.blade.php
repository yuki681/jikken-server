<!--<html>
    <body>
        <p>{{$menu['name']}}</p>
    </body>
</html>
--> 

@extends('../layouts/app')
@section('title', '詳細画面')

@section('content')
    <div class="row row-left va-middle">
        <div class="col-xs-8 col-sm-8"><p>明石高専学生食堂システム</p></div>
        <div class="col-xs-4 col-sm-4">
            <nav aria-label="Page navigation example">
            <ul class="pagination">
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
        <!--メニュー名や価格-->
        <div class="row row-center va-middle">
        <div class="col-xs-7 col-sm-7">
            <div class="row row-left va-middle">
            <div class="col-xs-12 col-sm-12">
                <p>日替わりメニュー Aセット</p>
            </div>
            </div>
            <div class="row row-left va-middle">
            <div class="col-xs-12 col-sm-12">
                <p class="name"><font color="#000099"><b>アジフライおろしポン酢</b></font></p>
            </div>
            </div>
            <div class="row row-left va-middle">
            <div class="col-xs-12 col-sm-12">
                <p>ライス・味噌汁付き</p>
            </div>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3"><p>販売価格（税込）</p></div>
        <div class="col-xs-2 col-sm-2"><p><b>￥420</b></p></div>
        </div>
        <hr>
        <!--栄養価表示-->
        <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div clas="row">
            <p>栄養価表示</p>
            </div>
            <div clas="row">
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
        <div class="col-xs-4 col-sm-4">
            <p>販売状況</p>
        </div>
        <div class="col-xs-4 col-sm-4">
            <p style="text-align: center"><font color="green"><b>販売中</b></font></p>
        </div>
        <div class="col-xs-4 col-sm-4">
            <button type="button" class="btn btn-outline-danger">売り切れにする</button>
        </div>
        </div>
        <hr>
        <!--レビュー-->
        <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="row">    
            <div class="col-xs-6 col-sm-6">
                <p>レビュー</p>
            </div>
            <div class="col-xs-6 col-sm-6">
                <p>平均満足度：★★★★★</p>
            </div>
            </div>
            <hr style="border:none;border-top:dashed 1px #d3d3d3;height:1px;color:#FFFFFF;">
            <div class="row">
            <div class="col-xs-12 col-sm-12">
                <p>明石　太郎さんの満足度：★★★★★</p>
                <p>美味しかったです。この価格でこのボリュームはお得だと思います。</p>
            </div>
            </div>
            <hr style="border:none;border-top:dashed 1px #d3d3d3;height:1px;color:#FFFFFF;">
            <div class="row">
            <div class="col-xs-12 col-sm-12">
                
                <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">名前を書く</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="名前を入力…">
                </div>
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