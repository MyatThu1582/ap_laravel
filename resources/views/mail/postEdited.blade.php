<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello {{ $user->name }}
    <h3>{{ $post->title }} Edited Successfully</h3>

    <a href="{{ $url }}">Go Back To Post</a>
</body>
</html>