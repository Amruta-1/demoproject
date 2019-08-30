@extends('Eshopper.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Address {{ $address->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/address') }}" title="Back" ><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/address/' . $address->id . '/edit') }}" title="Edit address"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/address' . '/' . $address->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-sm" title="Delete address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $address->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $address->customername }} </td></tr><tr><th> Address1 </th><td> {{ $address->address1 }} </td></tr><tr><th> Address2 </th><td> {{ $address->address2 }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
