@extends('master')

@section('content')
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
                        <div class="pull-left">
                        <h2>Create New Banner </h2>
                        </div>
                        <div class="pull-right"><br>
                        <a href="{{ url('/admin/banners') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        </div>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>
                        <form method="POST" action="{{ url('/admin/banners') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.banners.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
