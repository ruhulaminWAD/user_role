<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page->page_title }}</title>
</head>
<body>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <img src="{{ asset($page->page_image) }}" alt="">
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $page->page_title }}</h4>
                <p class="card-text">{!! $page->page_short !!}</p>
            </div>
            <div class="card-footer text-muted">
                {!! $page->page_long  !!}
                {!! $page->page_image  !!}
            </div>
        </div>
    </div>

</body>
</html>
