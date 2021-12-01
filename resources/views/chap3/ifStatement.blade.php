<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>テンプレート中のif</title>
</head>
	<body>
		<p>
		@if($rand === 1)
			大吉です!<br>
			おめでとうございます!
		@elseif($rand === 2)
			中吉です!
		@else
			凶です!
		@endif
		</p>
	</body>
</html>