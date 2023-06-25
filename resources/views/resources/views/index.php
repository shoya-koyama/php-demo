<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <link href="{{ asset('resouces/css/default.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>

  </head>
  <body>
  <div style="text-align: center;">
    <h1>塾報告書</h1>
    <div style="text-align: center;">
      <img src="https://icongr.am/feather/wifi.svg?size=60&color=currentColor" >
    </div>
    <p>こちらから報告せよ</p>

    <form action="{{ route('index') }}" method="post">
      @csrf
      <div>
        <label for="titleInput">生徒氏名</label><br>
        <input id="titleInput" name="title" type="text" row="1" placeholder="報告のタイトルを入力してね♡">
      </div>
      <div>
        <label for="textInput">詳細</label><br>
        <textarea id="textInput" name="text" rows="3" placeholder="点数など入力してね♡"></textarea>
      </div>
      <div>
        <button class="report-button" type="submit">報告</button>
      </div>
      <!-- Your CSS and JavaScript code here -->
    </form>
    <p>※保護者様が不快に思うことを投稿するな。</p>
    <br>
    <div>
      <a href="{{ route('index', ['sort' => 'Date']) }}" id="sort_new">新着順</a>
      <a href="{{ route('index', ['sort' => 'like']) }}" id="sort_like">♡順</a>
    </div>
    <br>
    <br>
    @if ($articles->count())
    @foreach ($articles as $article)
    <div class="text">
      <small>[{{ $article->posted_at }}]</small>
      <h2><a href="{{ route('detail', $article->id) }}">{{ $article->title }}</a></h2>
    </div>
    <div>
        <!--<a href="" onclick="like({{$article->id}});">
        ♡:<span id="like{{ $article->id }}">{{ $article->like }}</span>
        <script>
    function like(articleId) {
    // ここに「like」機能を実装します。
    // たとえば、Ajaxを使用してサーバーにリクエストを送信します：

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("like" + articleId).innerHTML = this.responseText;
         }
     };
     xhttp.open("POST", "/like/" + articleId, true);
     xhttp.send();
}
</script>

      </a>-->
    </div>
    @endforeach
    @else
    <p>No article.</p>
    @endif
    <p>この付近です。</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3235.677907582629!2d139.84263751436646!3d35.8078398306271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018900d65a25555%3A0x46f85833948553da!2z5YWr5r2u6aeF!5e0!3m2!1sja!2sjp!4v1680854922254!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  </div>
  </body>
</html>


