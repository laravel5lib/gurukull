@component('mail::message')
# {{$group->name}}
# You have actions that need to be completed.


@foreach($member->flags as $flag)
* {{__("flags.{$flag->type}")}} 
@endforeach

@component('mail::button', ['url' => route('home'), 'color' => 'green'])
Action List
@endcomponent


@endcomponent
