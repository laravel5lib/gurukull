<?php

namespace App\Http\Controllers\Discussion;

use App\Group;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupDiscussionStoreController extends Controller
{
    public function __invoke(Request $request, Group $group)
    {
        $author = Member::byGroupUser($group, auth()->user())->firstOrFail();

        $input = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'is_urgent' => 'required|boolean',
        ]);

        $discussion = $group->discussions()->create([
            'author_id' => $author->id,
            'title' => $input['title'],
            'body' => $input['body'],
            'is_urgent' => $input['is_urgent'],
        ]);

        return $this->route('groups.discussions.show', [$group->slug, $discussion->id]);
    }
}
