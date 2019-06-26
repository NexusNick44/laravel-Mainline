@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <form action="{{ route('admin.shop-front.updateBlocks') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                @foreach($blocks->where('id', 1) as $block)
                    <div class="card">
                        <div class="card-header">
                            Block 1
                        </div>
                        <div class="card-body">
                            <img src="/img/frontend/Wood_Desk.png" alt="" class="img-fluid">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title[]" value="{{ $block->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="text[]" rows="5">{{ $block->text }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-sm-12">
                @foreach($blocks->where('id', 2) as $block)
                    <div class="card">
                        <div class="card-header">
                            Block 2
                        </div>
                        <div class="card-body">
{{--                            <input name="id[]" value="{{ $block->id }}" hidden>--}}
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title[]" value="{{ $block->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="text[]" rows="5">{{ $block->text }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                @foreach($blocks->where('id', 3) as $block)
                    <div class="card">
                        <div class="card-header">
                            Block 3
                        </div>
                        <div class="card-body">
{{--                            <input name="id[]" value="{{ $block->id }}" hidden>--}}
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title[]" value="{{ $block->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="text[]" rows="5">{{ $block->text }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-sm-12">
                @foreach($blocks->where('id', 4) as $block)
                    <div class="card">
                        <div class="card-header">
                            Block 4
                        </div>
                        <div class="card-body">
{{--                            <input name="id[]" value="{{ $block->id }}" hidden>--}}
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title[]" value="{{ $block->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="text[]" rows="5">{{ $block->text }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button id="submit_blocks" class="btn btn-primary">Update All</button>
    </form>




@endsection
