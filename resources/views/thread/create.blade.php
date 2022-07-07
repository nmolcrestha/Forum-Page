@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Thread') }}</div>

                <div class="card-body">
                   <form action="{{ route('thread.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title for Thread">
                        <label for="title">Title</label>
                      </div>
                      <div class="form-floating  mb-3">
                        <textarea class="form-control" placeholder="Body for Thread" id="floatingTextarea2" style="height: 100px" name="body" id="body"></textarea>
                        <label for="floatingTextarea2">Body</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Post</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
