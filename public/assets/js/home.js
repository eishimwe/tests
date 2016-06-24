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
          
            sAjaxSource : "sponsors-list/",
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

var sponsoredUsersTable = function() {
    "use strict";

    if ($('#sponsored-users-table').length !== 0) {
        $('#sponsored-users-table').DataTable({
            dom: 'rfrtip',
           
            responsive: true,
           
            sAjaxSource : "sponsored-list/",
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


/* Application Controller
------------------------------------------------ */
var PageDemo = function () {
	"use strict";
	
	return {
		//main function
		init: function () {

            sponsorsUsersTable();
            sponsoredUsersTable();
		}
  };
}();