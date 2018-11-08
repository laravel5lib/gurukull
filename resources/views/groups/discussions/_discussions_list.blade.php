<div class="mb-3" v-cloak>
    @if ($discussions->count())
        <div class="list-group">
            @foreach ($discussions as $discussion)
                <modal-discussion-thread :initial-discussion="{{ $discussion->toJson() }}" :members="{{ $members->toJson() }}" :group="{{ $group->toJson() }}">
                    <div class="mr-auto">  
                        @if (! in_array($discussion->id, array_flatten($list_read_discussions)))
                            <div><b>{{$discussion->title }}</b></div>
                        @else
                            <div>{{ $discussion->title }}</div>
                        @endif
                        <div class="text-muted small">
                            @if ($discussion->author)
                                by {{ $discussion->author->user->name }}
                                &ndash;
                            @endif
                            {{ $discussion->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div>
                        <span class="text-muted small"><b>{{ $discussion->replies_count }}</b> replies</span>
                    </div>
                </modal-discussion-thread>
            @endforeach
        </div>
    @else
        <div class="card-body text-center">
            <p class="mb-0">
                There are no discussions here.
            </p>
        </div>
    @endif
</div>