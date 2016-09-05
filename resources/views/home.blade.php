@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>


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
