<html>
<body>
<h1>New Test Comment on the Gantry Test Page</h1>
<p>Your comment has been submitted</p>
<p><b>Date:</b>{{$test_comment->updated_at}}</p>
<p><b>URL:</b><a href="{{url('/').'/'.($test_comment->uri)}}">{{$test_comment->uri}}</a></p>
<p><b>From:</b> {{\App\User::find($test_comment->user_id)->name}}</p>
<p><b>Comment:</b>{{$test_comment->comment}}</p>

</body>
</html>