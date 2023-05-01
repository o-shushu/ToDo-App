<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/">ToDo App</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-default">
                        <div class="panel-heading">
                            ページは見つかりません。
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                            <a href="{{ route('home.index') }}" class="btn btn-primary">
                                TOPへ
                            </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
