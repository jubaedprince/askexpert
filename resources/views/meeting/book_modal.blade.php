<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Request a Booking</h4>
            </div>
            <div class="modal-body">
                @include('meeting.book_modal_form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary meeting-request-button">Request Now</button>
            </div>
        </div>
    </div>
</div>


<script>

    $(".meeting-request-button").on("click", function(e){
        console.log("Meeting request button clicked");
        e.preventDefault();
//        $('#request-meeting-form').attr('action', "/expert/{expert_id}/meeting").submit();
        var formData = getFormObj('request-meeting-form');
//        formData['_token'] =  $('meta[name="csrf-token"]').attr('content');
//        console.log(formData);
        $.ajax({
            url : "/expert/"+ EXPERT_ID+ "/meeting",
            type: "POST",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {

                $(".modal-body").html('<h1>Done! We will contact you.</h1>');
                $(".meeting-request-button").hide();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(errorThrown);
            }
        });
    });


    function getFormObj(formId) {
        var formObj = {};
        var inputs = $('#'+formId).serializeArray();
        $.each(inputs, function (i, input) {
            formObj[input.name] = input.value;
        });
        return formObj;
    }

    $(document).on('hide.bs.modal','#myModal', function () {
        location.reload();
    });
</script>