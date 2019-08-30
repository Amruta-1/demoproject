@extends('master')

@section('content')
    
<div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="pull-left">
        <h2>Configuration </h2>
        </div>
        <br>
        <div class="pull-right">
        <a href="{{ url('/admin/configurations/create') }}" class="btn btn-success btn-sm" title="Add New Configuration">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
`       </div>

        <form method="GET" action="{{ url('/admin/configurations') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
            <div class="pull-right">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit" style="margin-right: 10px;  ">
                        <i class="fa fa-search"></i>
            </div>
                    </button>
                </span>
            </div>
        </form>

        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th><th>Name</th><th>Value</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($configurations as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td><td>{{ $item->value }}</td>
                        <td>
                            <a href="{{ url('/admin/configurations/' . $item->id) }}" title="View Configuration"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/admin/configurations/' . $item->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('/admin/configurations' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $configurations->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

            
    </div>
</div>

@endsection
