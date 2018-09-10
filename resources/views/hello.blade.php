<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <!-- viewport meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <link rel='stylesheet' href='css/bootstrap4-hello-world.css'>
    <link rel='stylesheet' href='css/bootstrap4-hello-world.min.css'>

    <link rel='stylesheet' href='css/style.css'>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="js/hello.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navigation">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#!">ToDoList</a>
    </nav>

    <div id="content">
            @if($errors->has('genre'))
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> {{ $errors->first('genre') }}
            </div>
            @endif
            @isset($status)
            <div class="alert alert-primary" role="alert">
                <strong>Well done!</strong> You successfully read this important alert message.
            </div>
            @endisset
        <div class="card">
            <div class="card-header">
                addToDoLists
            </div>

            <div class="card-body">
                <blockquote class="card-blockquote">
                    <p>add ToDoLists!</p>
                    <form action="\hello" method="POST">
                        {{ csrf_field() }}
                        <select class="custom-select" name="genre">
                            <option selected="">Category</option>
                            <option value="1">今すぐ</option>
                            <option value="2">普通</option>
                            <option value="3">後回し</option>
                        </select>
                        <input class="form-control" type="text" name="content" id="example-text-input">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                ToDoList
            </div>
            <div class="card-body">
                <blockquote class="card-blockquote">
                    <form action=''>
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th id='category'>Category</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todolist as $todo)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                            @if($todo->genre==1)
                                                今すぐ
                                            @elseif($todo->genre==2)
                                                普通
                                            @elseif($todo->genre==3)
                                                後回し
                                            @endif
                                            </td>
                                        <td>{{ $todo->content }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </blockquote>
            </div>
        </div>
    </div>
</body>

</html>
