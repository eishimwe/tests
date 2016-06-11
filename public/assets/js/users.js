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
            responsive: true,
            autoFill: true,
            colReorder: true,
            keys: true,
            rowReorder: true,
            select: true,
            sAjaxSource : "users-list",
            columns :[
                {data: 'id', name: 'users.id'},
                {data: 'username', name: 'users.username'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'cellphone', name: 'users.cellphone'},
                {data: 'email', name: 'users.email'},
                {data: 'id_number', name: 'users.id_number'},

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