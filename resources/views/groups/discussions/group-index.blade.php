@extends('layouts.app')

@section('title', 'Group Discussions')

@section('content')
    <div class="container">
        <h1 class="mb-3">Group Discussions</h1>

        <div class="row">
            <div class="col">
                <div class="d-flex mb-3">
                    <div class="ml-auto">
                        <a href="{{ route('groups.discussions.create', [$group->slug]) }}" class="btn btn-secondary">
                            <i class="fa fa-plus" aria-hidden="true"></i> new group discussion
                        </a>
                    </div>
                </div>

                @include('groups.discussions._discussions_list')
            </div>
            <div class="col-md-4 order-md-first">
                @include('groups.discussions._discussions_menu')
            </div>
        </div>
    </div>
@endsection