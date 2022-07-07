@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted
                    {{ $thread->title }}
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach ($thread->replies as $reply)
        <div class="col-md-8 mb-3">
                @include('thread.replies')
            </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            @auth
            <form action="{{ route('reply.store',$thread) }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="body" id="body"></textarea>
                    <label for="floatingTextarea2">What do you think?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @else
            <p>Please <a href="{{ route('login') }}">Log In</a></p>
            @endauth
        </div>
    </div>
</div>
@endsection
