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
            colReorder: true,
            rowReorder: true,
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
            colReorder: true,
            rowReorder: true,
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
            colReorder: true,
            rowReorder: true,
            sAjaxSource : "transactions-list/",
            columns :[
                {data: 'created_at', name: 'transactions.created_at'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'primary_contact', name: 'contacts.primary_contact'},
                {data: 'description', name: 'transaction_types.description'},

                {data : function(data){
  
                    return "<a class='btn btn-xs btn-block btn-success' onClick='launchAmountModal(" + data.id + ");'>Add Amount</a>";              
                   
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
		}
  };
}();