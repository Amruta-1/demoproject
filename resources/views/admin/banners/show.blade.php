@extends('master')

@section('content')
    <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
    
           

           <br>         <h3 style="text-align:center;">Banners</h3>

                        <a href="{{ url('/admin/banners') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/banners/' . $banner->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/banners' . '/' . $banner->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $banner->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $banner->name }} </td></tr><tr><th> Banner </th><td> 
                                                  <img src="{{asset('storage/'.$banner->banner)}}" height="50" width="50"></img>

                                     </td></tr>
                                </tbody>
                            </table>
                        </div>

    </div>
</div>
@endsection
