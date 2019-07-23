@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3>Mainline Products</h3>
                        <a href="" id="" style="color: #FFFFFF" class="btn btn-success ml-5"><i class="fas fa-plus-circle"></i> Add New</a>
                    </div>

                </div>
                <div class="col-sm-3 col-sm-12">
                    <div class="card-body">
                        <table id="example" class="display table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
