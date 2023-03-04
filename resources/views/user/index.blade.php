<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>ユーザー一覧</title>
</head>
<body>
@include('parts.nav')
  <H1>ユーザー一覧</H1>
  <table class="table">
        <tr>
            <th scope="col">登録番号</th>
            <th scope="col">氏名</th>
            <th scope="col">権限</th>
            <th scope="col">メール</th>
            <th scope="col">編集</th>
        </tr>
        @foreach( $rows as $row )
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td> @if($row->role) 管理者 @else 利用者 @endif </td>
            <td>{{ $row->email }}</td>
            <td><a href="/user/edit/{{ $row->id }}">編集</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>