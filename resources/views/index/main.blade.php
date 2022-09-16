<html>
    <head>
    </head>
    <body>
        @foreach ($branches as $branch)

        <a href="{{route('fetch', ['id' => $branch->id])}}">{{$branch->name}}</a><br />

        @endforeach
    </body>
</html>
