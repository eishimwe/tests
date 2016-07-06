/*   

Version: 1.0
Author: Elie

*/

var usersTable = function() {
    "use strict";

    if ($('#users-table').length !== 0) {
        $('#users-table').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            sAjaxSource : "users-list",
            columns :[
                {data: 'id', name: 'users.id'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'email', name: 'users.email'},
                {data: 'cellphone', name: 'contacts.primary_contact'},
                {data: 'description', name: 'user_registration_statuses.description'},
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

            usersTable();
		}
  };
}();