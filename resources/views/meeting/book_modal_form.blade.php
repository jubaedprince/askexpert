<form class="form-horizontal" id="request-meeting-form" role="form" method="POST" action="{{ url('/') }}">
    {{ csrf_field() }}
    @include('meeting.input_snippet', ['name'=> 'requestor_name', 'label'=>'Your Name', 'type'=>'text'])
    @include('meeting.input_snippet', ['name'=> 'requestor_phone_number', 'label'=>'Your Phone Number', 'type'=>'text'])
    @include('meeting.input_snippet', ['name'=> 'preferable_date', 'label'=>'Preferable Date' , 'type'=>'date'])


    @php
        $list_of_time = [
        '9:00 am',
        '9:30 am',
        '10:00 am',
        '10:30 am',
        '11:00 am',
        '11:30 am',
        '12:00 pm',
        '12:30 pm',
        '1:00 pm',
        '1:30 pm',
        '2:00 pm',
        '2:30 pm',
        '3:00 pm',
        '3:30 pm',
        '4:00 pm',
        '4:30 pm',
        '5:00 pm',
        '5:30 pm',
        '6:00 pm',
        '6:30 pm',
        '7:00 pm',
        '7:30 pm',
        '8:00 pm',
        '8:30 pm',
        '9:00 pm',
        '9:30 pm',
        '10:00 pm',
        '10:30 pm',
        '11:00 pm',
        ];
        $list_of_cost = [

        ];

    @endphp


    @include('meeting.input_snippet_for_select_list', ['name'=> 'preferable_time', 'label'=>'Preferable Time' , 'list'=>$list_of_time])
    @include('meeting.input_snippet_for_select_list', ['name'=> 'estimated_duration', 'label'=>'Estimated Duration' , 'list'=>$list_of_cost])
    @include('meeting.input_snippet_for_text_area', ['name'=> 'discussion_topics', 'label'=>'Discussion Topics'])
</form>

