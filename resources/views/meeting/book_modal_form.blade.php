<form class="form-horizontal" id="request-meeting-form" role="form" method="POST" action="{{ url('/') }}">
    {{ csrf_field() }}
    @include('meeting.input_snippet_for_text', ['name'=> 'requestor_name', 'label'=>'Your Name'])
    @include('meeting.input_snippet_for_text', ['name'=> 'requestor_phone_number', 'label'=>'Your Phone Number'])
    @include('meeting.input_snippet_for_text', ['name'=> 'preferable_date', 'label'=>'Preferable Date'])
    @include('meeting.input_snippet_for_text', ['name'=> 'preferable_time', 'label'=>'Preferable Time'])
    @include('meeting.input_snippet_for_text', ['name'=> 'estimated_duration', 'label'=>'Estimated Duration'])
    @include('meeting.input_snippet_for_text', ['name'=> 'discussion_topics', 'label'=>'Discussion Topics'])
</form>