/*   

Version: 1.0
Author: Elie

*/

var sponsorsUsersTable = function() {
    "use strict";

    if ($('#sponsors-users-table').length !== 0) {
        $('#sponsors-users-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
           
            sAjaxSource : "sponsors-list/",
            columns :[
                {data: 'sponsor_type', name: 'sponsors_type.description'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
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

var sponsoredUsersTable = function() {
    "use strict";

    if ($('#sponsored-users-table').length !== 0) {
        $('#sponsored-users-table').DataTable({
            dom: 'rfrtip',
            order :[[0,"asc"]],
            responsive: true,
            autoFill: true,
          
            sAjaxSource : "sponsored-list/",
            columns :[
                {data: 'created_at', name: 'users.created_at'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data: 'description', name: 'user_registration_statuses.description'},

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

    if ($('#transactions-table').length !== 0) {
        $('#transactions-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
           
            sAjaxSource : "transactions-list/",
            columns :[
                {data: 'id', name: 'transactions.id'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data: 'description', name: 'transaction_types.description'},
               

                {data : function(data){

                    if (data.description == 'Pending Payout' && !data.transaction_payout_amount) {

                        return "<a  id='amountModal' class='btn btn-xs btn-block btn-success' onClick='launchAmountModal(" + data.id + ");'>Add Amount</a>";              

                    } else {

                        return "R" + data.transaction_payout_amount;

                    }
                   
                }
                },
                {data: 'transaction_payout_date', name: 'transactions_payouts.payout_date'},
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};


var giftsTable = function() {
    "use strict";

    if ($('#gifts-table').length !== 0) {
        $('#gifts-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
           
            sAjaxSource : "gifts-list/",
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

                    if (data.donation_status == 0) {

                       return "<button class='btn btn-xs btn-danger btn-rounded m-b-5' type='button'>Not Paid</button>" ;
                    }

                    if (data.donation_status == 1) {

                       return "<button class='btn btn-xs btn-success btn-rounded m-b-5' type='button'>Paid</button>" ;
                    }

                    

                }},
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};

var myDonationsTable = function() {
    "use strict";

    if ($('#my-donations-table').length !== 0) {
        $('#my-donations-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
            autoFill: true,
           
            sAjaxSource : "my-donations-list/",
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

                    if (data.donation_status == 0) {

                       return "<button class='btn btn-xs btn-danger btn-rounded m-b-5' type='button'>Not Paid</button>" ;
                    }

                    if (data.donation_status == 1) {

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
                {data : function(data){

                    if (data.is_valid == 1) {
                        return  (data.donation_amount - data.donated_amount) + ' available';
                    }
                    else {

                        return 'not available';
                    }


                   
                }
                },
               
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

            sponsorsUsersTable();
            sponsoredUsersTable();
            transactionsTable();
            donationsTable();
            giftsTable();
            myDonationsTable();
		}
  };
}();