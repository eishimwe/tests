@extends('master')

@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				
				<li class="active">Banking Details</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Banking Details</small></h1>
			<!-- end page-header -->
			
			<!-- begin section-container -->
			<div class="section-container section-with-top-border">
                <p class="m-b-20">
                    
                </p>
                <!-- begin panel -->
                <div class="panel pagination-inverse clearfix m-b-0">
                    <table id="bank-accounts-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                        <thead>
                            <tr class="inverse">
                             
                                <th>Bank Name</th>
                                <th>Bank Holder</th>
                                <th>Bank Account</th>
                                <th>Branch Code</th>
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


var bank_accounts_table = function() {
    "use strict";

    if ($('#bank-accounts-table').length !== 0) {
        $('#bank-accounts-table').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            autoFill: true,
            colReorder: true,
            keys: true,
            rowReorder: true,
            select: true,
            sAjaxSource : "banking-list",
            columns :[
               
                {data: 'description', name: 'bank_types.description'},
                {data: 'account_holder', name: 'bank_accounts.account_holder'},
                {data: 'account_number', name: 'bank_accounts.account_number'}, 
                {data: 'branch_code', name: 'bank_accounts.branch_code'}, 
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

            bank_accounts_table();
		}
  };
}();

</script>

@endsection