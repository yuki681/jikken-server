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
                <a class="page-link" href="/schedule?date={{$date_before}}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">{{ $date }}</a></li>
              <li class="page-item">
                <a class="page-link" href="/schedule?date={{$date_after}}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav> 
        </div>
      </div>
      <hr color="black" style="margin:6px 0px 6px 0px">
      <!--1つのかたまり-->
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-12 align-self-center">日替わりメニュー　Aセット</div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">
              <p class="h4" style="margin-top: 10px"><b>
                <a href="schedule/{{$a_menu->id}}">{{$a_menu->name}}</a>                <!--font color="#000099"><u><b>アジフライおろしポン酢</b></u></font-->
              </b></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">レビュー：
              <?php if($a_menu->getMeansReputation() != NULL): ?>
                <?php for($i = 0; $i < 5;$i++):?>
                  <?php if(floor($a_menu->getMeansReputation()) < $i):?>
                    ★
                  <?php else:?>
                    ☆
                  <?php endif;?>
                <?php endfor; ?>
                </div>
              <?php else:?>
                まだ評価されてません</div>
              <?php endif;?>
          </div>
        </div>
        <div class="col-6">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4" style="margin-top: 10px"><b>￥{{$a_menu->price}}</b></p>
            </div>
          </div>
          <hr style="margin: 0px 0px 0px 0px">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売状況</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <?php if($date == date("Y-m-d")): ?>
                <?php if(is_null($a_menu->sold_time)): ?>
                  <p class="h4" style="margin-top: 10px"><font color="#228B22"><strong>販売中</strong></font></p>
                <?php else: ?>
                  <p class="h4" style="margin-top: 10px"><font color="#ff0000"><strong>売り切れ</strong></font></p>
                <?php endif;?>
              <?php elseif($date > date("Y-m-d")): ?>
                <p class="h4"style="margin-top: 10px"><font color="#808080">販売前<strong></strong></font></p>
              <?php else:?>
                <p class="h4"style="margin-top: 10px"><font color="#808080">販売終了<strong></strong></font></p>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <hr color="black" style="margin:6px 0px 6px 0px">

      <!--1つのかたまり-->
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-12 align-self-center">日替わりメニュー　Bセット</div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">
              <p class="h4" style="margin-top: 10px"><b><a href="schedule/{{$b_menu->id}}">{{$b_menu->name}}</a></b>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center">レビュー：
              <?php if($b_menu->getMeansReputation() != NULL): ?>
                <?php for($i = 0; $i < 5;$i++):?>
                  <?php if(floor($b_menu->getMeansReputation()) < $i):?>
                    ★
                  <?php else:?>
                    ☆
                  <?php endif;?>
                <?php endfor; ?>
                </div>
              <?php else:?>
                まだ評価されてません</div>
              <?php endif;?>
          </div>
        </div>
        <div class="col-6">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <p class="h4" style="margin-top: 10px"><b>￥{{$b_menu->price}}</b></p>
            </div>
          </div>
          <hr style="margin: 0px 0px 0px 0px">
          <div class="row h-50">
            <div class="col-6 align-self-center" style="text-align:center">販売状況</div>
            <div class="col-6 align-self-center" style="text-align:center">
              <?php if($date == date("Y-m-d")): ?>              
                <?php if(is_null($b_menu->sold_time)): ?>
                  <p class="h4" style="margin-top: 10px"><font color="#228B22"><strong>販売中</strong></font></p>
                <?php else: ?>
                  <p class="h4" style="margin-top: 10px"><font color="#ff0000"><strong>売り切れ</strong></font></p>
                <?php endif;?>
              <?php elseif($date > date("Y-m-d")): ?>
                <p class="h4"style="margin-top: 10px"><font color="#808080">販売前<strong></strong></font></p>
              <?php else:?>
                <p class="h4"style="margin-top: 10px"><font color="#808080">販売終了<strong></strong></font></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <hr color="black" style="margin:6px 0px 6px 0px">

      <!--1つのかたまり-->
      <div class="row">
        <?php foreach($menus as $menu): ?>
          <div class="col-6">
            <div class="row">
              <div class="col-12 align-self-center">常設メニュー</div>
            </div>
            <div class="row">
              <div class="col-12 align-self-center">
                <p class="h4" style="margin-top: 10px"><font color="#000099"><u><b><a href="schedule/{{$menu->id}}">{{$menu->name}}</a></b></u></font></p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 align-self-center">レビュー：
              <?php if($menu->getMeansReputation() != NULL): ?>
                <?php for($i = 0; $i < 5;$i++):?>
                  <?php if(floor($menu->getMeansReputation()) < $i):?>
                    ★
                  <?php else:?>
                    ☆
                  <?php endif;?>
                <?php endfor; ?>
                </div>
              <?php else:?>
                まだ評価されてません</div>
              <?php endif;?>
            </div>
          </div>
          <div class="col-6">
            <div class="row h-50">
              <div class="col-6 align-self-center" style="text-align:center">販売価格（税込）</div>
              <div class="col-6 align-self-center" style="text-align:center">
                <p class="h4" style="margin-top: 10px"><b>￥{{$menu->price}}</b></p>
              </div>
            </div>
            <hr style="margin: 0px 0px 0px 0px">
            <div class="row h-50">
              <div class="col-6 align-self-center" style="text-align:center">販売状況</div>
              <div class="col-6 align-self-center" style="text-align:center">
                <?php if($date == date("Y-m-d")): ?>
                  <?php if(is_null($menu->sold_time)): ?>
                    <p class="h4" style="margin-top: 10px"><font color="#228B22"><strong>販売中</strong></font></p>
                  <?php else: ?>
                    <p class="h4" style="margin-top: 10px"><font color="#ff0000"><strong>売り切れ</strong></font></p>
                  <?php endif;?>
                <?php elseif($date > date("Y-m-d")): ?>
                  <p class="h4"style="margin-top: 10px"><font color="#808080">販売前<strong></strong></font></p>
                <?php else:?>
                  <p class="h4"style="margin-top: 10px"><font color="#808080">販売終了<strong></strong></font></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <hr color="black" style="margin:6px 0px 6px 0px">
    </div>
  </body>
</html>