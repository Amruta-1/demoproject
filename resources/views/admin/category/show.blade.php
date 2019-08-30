@extends('master')

@section('content')
   
    <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="pull-left">
        <h2>Category </h2>
        </div>
        <br>
                     <div class="pull-right">
                        <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/category/' . $category->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/category' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> </div>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $category->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $category->category }}  </td></tr>
                                    <tr>
                                   <th>Parent Category </th><td> {{ $categories->parent->category }} </td></tr>

                                </tbody>
                            </table>
                       

        </div>
    </div>
            
@endsection
