@extends('master')

@section('content')
    
<div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        <div class="pull-left">
            <h2>View Configuration </h2>
        </div>
        
            <br>
            <div class="pull-right">
                <a href="{{ url('/admin/configurations') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/admin/configurations/' . $configuration->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
            </div>
            <form method="POST" action="{{ url('admin/configurations' . '/' . $configuration->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="pull-right">
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)" style="margin-right:10px;><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </div>
            </form>
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $configuration->id }}</td>
                        </tr>
                        <tr><th> Name </th><td> {{ $configuration->name }} </td></tr><tr><th> Value </th><td> {{ $configuration->value }} </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        
</div>
           
@endsection
