@extends('master')

@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				
				<li class="active">Orders / Investments Details</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Orders / Investment Details </small> </h1>
			<!-- end page-header -->
			
			<!-- begin section-container -->
			<div class="section-container section-with-top-border">
                @if(Session::has('success'))
                <div class="alert alert-success alert-bordered fade in m-b-10">
                    <strong>Success!</strong>
                    {{ Session::get('success') }}
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
                @endif
                <!-- begin panel -->
                <div class="panel pagination-inverse clearfix m-b-0">
                    <table id="donations-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="inverse">
                             
                                <th>Order Amount</th>
                                <th>Order Returns</th>
                                <th>Created Date</th>
                                <th data-sorting="disabled"></th>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
                <!-- end panel -->
			</div>
<!-- end section-container -->

<div class="modal fade modalInstantPayment" id="modalInstantPayment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Withdrawal Amount</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['url'=>'add_instant_payment','method'=>'post','class'=>'form-horizontal','id' => 'add_instant_payment_form']) !!}

                {!! Form::hidden('donationID',NULL,['id' => 'donationID']) !!}

                <div class="form-group m-b-10 @if ($errors->has('payout_amount')) has-error has-feedback @endif">
                    {!! Form::label('Withdrawal Amount', 'Withdrawal Amount', array('class' => 'col-md-3 control-label')) !!}

                    <div class="col-md-7">
                        {!! Form::text('withdrawal_amount',NULL,['class' =>'form-control','id' => 'withdrawal_amount' ]) !!}
                    </div>
                </div>

                <div class="form-group m-b-10">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <a id="submit_instant_payout_amount" class="btn btn-inverse">Request</a>
                    </div>
                </div>



                {!! Form::close() !!}



            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn width-100 btn-default" data-dismiss="modal">Close</a>

            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_stript')


<script>


var donations_table = function() {
    "use strict";

    if ($('#donations-table').length !== 0) {
        $('#donations-table').DataTable({
            dom: '<"toolbar">',
            responsive: true,
            autoFill: true,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            sAjaxSource : "donations-list",
            columns :[
               
                {data: 'donation_amount', name: 'donations.donation_amount'},
                {data: function(data){

                    var return_amount = (data.returns_percentage / 100) * data.donation_amount;
                    return_amount     = parseInt(return_amount) + parseInt(data.donation_amount);

                    return return_amount;

                }},
                {data: 'created_at', name: 'donations.created_at'},
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};


/* Application Controller
------------------------------------------------ */
var PageDemo = function () {
	"use strict";
	
	return {
		//main function
		init: function () {

			var buttonVar= "<a href='add-donation' class='btn btn-inverse m-b-5'><i class='fa fa-plus fa-1x pull-left'> Add New </i></a>";
             donations_table();

            $("div.toolbar").html(buttonVar);
		}
  };
}();


function launchInstantPayment(donation_id){

      $("#add_instant_payment_form #donationID").val(donation_id);
     $(".modalInstantPayment").modal('show');

}

$("#submit_instant_payout_amount").on("click",function(){



    var myForm   = $("#add_instant_payment_form")[0];
    var formData = new FormData(myForm);
    var token    = $('input[name="_token"]').val();


    $.ajax({
        type    :"POST",
        data    : formData,
        contentType: false,
        processData: false,
        headers : { 'X-CSRF-Token': token },
        url     :"{!! url('/save_transaction_payout_amount')!!}",
        beforeSend : function() {


        },
        success : function(data){

            //if (data) {
                //$('#modalAmount').modal('toggle');
                //$('#transaction_amount_form')[0].reset();
                //location.reload();

            //}


        },
        error: function(data){




            alert("Wrong Amount entered");


        }

    })

});


</script>

@endsection