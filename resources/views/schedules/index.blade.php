@extends('layouts.application')

@section('title', 'メニュー一覧画面')

@section('content')
    <div class="container">
      <!--ヘッダ的なやつ-->
      <div class="row">
        <div class="col-8 align-self-center">
          <h4>明石高専学生食堂システム</h4>
        </div>
        <div class="col-4">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="/index?date={{$date_before}}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">{{ $date }}</a></li>
              <li class="page-item">
                <a class="page-link" href="/index?date={{$date_after}}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav> 
        </div>
      </div>
      <hr>
      <!--1つのかたまり-->
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-12 align-self-center">日替わりメニュー　Aセット</div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">
              <p class="h4"><b>
                <a href="file:///home1/home-e/e1511/%E3%83%87%E3%82%B9%E3%82%AF%E3%83%88%E3%83%83%E3%83%97/jikken-server/markup/detail.html?">アジフライおろしポン酢</a>
                <!--font color="#000099"><u><b>アジフライおろしポン酢</b></u></font-->
              </b></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">レビュー：★★★★★</div>
          </div>
        </div>
        <div class="col-6">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4"><b>￥420</b></p>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">
                販売状況
            </div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4"><font color="#228B22"><strong>販売中</strong></font></p>
            </div>
          </div>
        </div>
      </div>
      <hr>

      <!--1つのかたまり-->
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-12 align-self-center">日替わりメニュー　Bセット</div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">
              <p class="h4"><font color="#000099"><u><b>豚焼き肉丼</b></u></font></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">レビュー：★★★★☆</div>
          </div>
        </div>
        <div class="col-6">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4"><b>￥360</b></p>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">
                販売状況
            </div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4"><font color="#ff0000"><strong>売り切れ</strong></font></p>
            </div>
          </div>
        </div>
      </div>
      <hr>

      <!--1つのかたまり-->
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-12 align-self-center">常設メニュー</div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">
              <p class="h4"><font color="#000099"><u><b>カレーライス</b></u></font></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">レビュー：★★★☆☆</div>
          </div>
        </div>
        <div class="col-6">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4"><b>￥290</b></p>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">
                販売状況
            </div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4"><font color="#228b22"><strong>販売中</strong></font></p>
            </div>
          </div>
        </div>
      </div>
      <hr>
</div>
@endsection