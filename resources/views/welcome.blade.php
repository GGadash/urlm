<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>URLM Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    URLM Welcome
                </div>


@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New URL
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New UrlMapping Form -->
                    <form action="{{ url('urlmapping')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- UrlMapping URL -->
                        <div class="form-group">
                            <label for="urlmapping-longurl" class="col-sm-3 control-label">URL</label>

                            <div class="col-sm-6">
                                <input type="text" name="longurl" id="urlmapping-name" class="form-control" value="{{ old('urlmapping') }}">
                            </div>
                        </div>

                        <!-- Add UrlMapping Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Shorten URL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    <!-- Current UrlMappings -->
    @if (count($url_mappings) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Shortened URLs
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>URLs</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($url_mappings as $urlmapping)
                            <tr>
                                <!-- UrlMapping URL -->
                                <td class="table-text">
                                    <div>{{ $urlmapping->longurl }}</div>
                                </td>

								
	<td>
    <!-- Delete Button -->
    <td>
        <form action="{{ url('urlmapping/'.$urlmapping->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> Delete
            </button>
        </form>
    </td>
</tr>

									
									
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
				
				
            </div>
        </div>
		</div>
    </body>
</html>
