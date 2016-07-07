<script>

var user_id = "{!! \Auth::user()->id !!}"; 

var sponsorsUsersTable = function(user_id) {
    "use strict";

    

    if ($('#sponsors-users-table').length !== 0) {
        $('#sponsors-users-table').DataTable({
            dom: 'rfrtip',
            responsive: true,
            autoFill: true,
            "ajax": {
                        "url"  : 'sponsors-list/' + user_id,
                        "type" : 'GET',
                        "beforeSend" : function(xhr) {
                          xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                         },
                   },
           
           
            columns :[


                {data : function(data){

                     if (data.paid == 0) {

                       return 'R'+ data.amount_due + "  <button type='button' class='btn btn-xs btn-danger btn-rounded m-b-5'>Not Paid</button>"; 
                    } else {

                       return 'R'+ data.amount_due + "  <button type='button' class='btn btn-xs btn-success btn-rounded m-b-5'>Paid</button>"; 

                    }


                   
                }
                },

                 {data: 'actions',  name: 'actions'},
                
                {data: 'username', name: 'users.username'},
               
                {data: 'primary_contact', name: 'contacts.primary_contact'},
              

               

            ]
        });
    }
};

var sponsoredUsersTable = function(user_id) {
    "use strict";

    if ($('#sponsored-users-table').length !== 0) {
        $('#sponsored-users-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            autoFill: true,
            sAjaxSource : "sponsored-list/" + user_id,
            columns :[
              
                {data: 'username', name: 'users.username'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
               

                {data : function(data){

                    

                    if (data.paid == 0) {

                       return 'R'+ data.amount_due + "  <button type='button' class='btn btn-xs btn-danger btn-rounded m-b-5'>Not Paid</button>"; 
                    } else {

                       return 'R'+ data.amount_due + "  <button type='button' class='btn btn-xs btn-success btn-rounded m-b-5'>Paid</button>"; 

                    }

                    

                   
                }
                },
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};

var transactionsTable = function() {
    "use strict";

    var token =  $('meta[name="csrf-token"]').attr('content');
  

    if ($('#transactions-table').length !== 0) {
        $('#transactions-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
            headers: {
                    'X-CSRF-TOKEN': token
            },
           
            sAjaxSource : "transactions-list/",
            columns :[
                {data: 'id', name: 'transactions.id'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data: 'description', name: 'transaction_types.description'},
               

                {data : function(data){

                    if (data.description == 'Pending Payout' && data.transaction_amount == false) {

                       
                        return "<a  id='amountModal' class='btn btn-xs btn-block btn-success' onClick='launchAmountModal(" + data.id + ");'>Add Amount</a>";              

                    } else {

                        return "R" + data.transaction_amount;

                    }
                   
                }
                },
                {data: 'transaction_payout_date', name: 'transactions.transactions_payout_date'},
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};


var giftsTable = function(user_id) {
    "use strict";

    if ($('#gifts-table').length !== 0) {
        $('#gifts-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            sAjaxSource : "gifts-list/" + user_id,
            columns :[
                {data: 'created_at', name: 'transactions_payouts.created_at'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.username'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'email', name: 'users.email'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data : function(data){
                
                    return "R" + data.donation_amount;
                            
                }
                },
                {data : function(data) {

                    if (data.donation_status == 1) {

                       return "<button class='btn btn-xs btn-danger btn-rounded m-b-5' type='button'>Not Paid</button>" ;
                    }

                    if (data.donation_status == 3) {

                       return "<button class='btn btn-xs btn-success btn-rounded m-b-5' type='button'> Paid</button>" ;
                    }

                    

                }},
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};

var myDonationsTable = function(user_id) {
    "use strict";

    if ($('#my-donations-table').length !== 0) {
        $('#my-donations-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            sAjaxSource : "my-donations-list/" + user_id,
            columns :[
                {data: 'actions',  name: 'actions'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.username'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'email', name: 'users.email'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data : function(data){
                
                    return "R" + data.donation_amount;
                            
                }
                },
                {data : function(data) {

                    if (data.donation_status == 1) {

                       return "<button class='btn btn-xs btn-danger btn-rounded m-b-5' type='button'>Not Paid</button>" ;
                    }

                    if (data.donation_status == 3) {

                       return "<button class='btn btn-xs btn-success btn-rounded m-b-5' type='button'>Paid</button>" ;
                    }

                    

                }}

            ]
        });
    }
};

var donationsTable = function() {
    "use strict";

    if ($('#donations-table').length !== 0) {
        $('#donations-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            sAjaxSource : "all-donations/",
            columns :[
                {data: 'created_at', name: 'donations.created_at'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data : function(data){

                    return "R " + data.donation_amount;

                   
                }
                },

                {data: 'description', name: 'donations_statuses.description'},
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

            sponsorsUsersTable(user_id);
            sponsoredUsersTable(user_id);
            transactionsTable();     
            giftsTable(user_id);
            myDonationsTable(user_id);
            donationsTable();
		}
  };
}();

</script>