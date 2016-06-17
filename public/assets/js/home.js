/*   

Version: 1.0
Author: Elie

*/

var sponsorsUsersTable = function() {
    "use strict";

    if ($('#sponsors-users-table').length !== 0) {
        $('#sponsors-users-table').DataTable({
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
            sAjaxSource : "sponsors-list/",
            columns :[
                {data: 'id', name: 'users.id'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'email', name: 'users.email'},
                {data: 'actions',  name: 'actions'}

            ]
        });
    }
};

var sponsoredUsersTable = function() {
    "use strict";

    if ($('#sponsored-users-table').length !== 0) {
        $('#sponsored-users-table').DataTable({
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
            sAjaxSource : "sponsors-list/",
            columns :[
                {data: 'id', name: 'users.id'},
                {data: 'first_name', name: 'users.first_name'},
                {data: 'last_name', name: 'users.last_name'},
                {data: 'email', name: 'users.email'},
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