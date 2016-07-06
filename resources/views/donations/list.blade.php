@extends('master')

@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				
				<li class="active">Donations Details</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Donations Details</small></h1>
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
                             
                                <th>Donation Amount</th>
                                <th>Donation Returns</th>
                                <th>Created Date</th>
                                <th data-sorting="disabled"></th>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
                <!-- end panel -->
			</div>
<!-- end section-container -->


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
            colReorder: true,
            keys: true,
            rowReorder: true,
            select: true,
            sAjaxSource : "donations-list",
            columns :[
               
                {data: 'donation_amount', name: 'donations.donation_amount'},
                {data: function(data){

                    var return_amount = (data.returns_percentage / 100) * data.donation_amount;
                    return_amount     = return_amount + data.donation_amount;

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

</script>

@endsection