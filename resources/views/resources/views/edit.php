<!DOCTYPE html>
<html>
  <head>    
    <title>報告書編集</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
  </head>
  <body>
  <div style="text-align: center;">
    <h1 >報告書編集</h1>
    <p>報告書を編集せよ</p>
    <form action="{{ route('update', $article->id) }}" method="post">
      @csrf
      <div>
        <label for="titleInput">見出し</label><br>
        <input id="titleInput" name="title" type="text"
          placeholder="Input title" value="{{ $article->title }}">
      </div>
      <div>
        <label for="textInput">詳細</label><br>
        <textarea id="textInput" name="text" rows="3">{{ $article->body }}</textarea>
      </div>
      <div>
        <button type="submit" id="edit_submit">編集して報告</button>
      </div>
      <br>
      <div class="hamon">
        <span class="ten -active"></span>
        <span class="ten -active"></span>
        <span class="ten -active "></span>
      </div>
      <p><a href="{{ route('index') }}" id="cancel">編集をやめる</a></p>
    </form>
  </div>
  </body>
</html>
