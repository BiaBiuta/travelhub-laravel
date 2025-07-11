<x-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <!-- DataTales Example -->
    <div>
        <select id="selectFormDepartment" class=" form-select" aria-label="Default select example">
            <option value="-1" selected>ALL</option>
        </select>
        <button id="dwnldBtn" >Export</button>
    </div>
    <div class=" card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="usersTable" class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead >
                        <tr>
                            <th>#</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                            <th>Departments</th>

                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
            </div>
        </div>
        <div id="alertDivButton" class=" alert alert-warning hidden  alert-dismissible fade show" hidden role="alert">
            <strong>S-a sters cu succes</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

</div>


</x-layout>
<!-- table2excel plugin CDN -->
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
$(document).ready(function() {
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var index=1;
            var $tabelUsers = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('users.data') }}',
                    data: function (d) {
                        d.department_id = $('#selectFormDepartment').val();
                    }
                },
                columns: [
                    
                    {data: 'firstName', name: 'firstName', className: 'center', orderable: false},
                    {data: 'lastName', name: 'lastName', className: 'center', orderable: false},
                    {data: 'email', name: 'email', className: 'center', orderable: false},
                    {data: 'address', name: 'address', className: 'center', orderable: false},
                    {data: 'actions', name: 'actions', className: 'center', orderable: false, searchable: false},
                    {data: 'nameDepartment', name: 'nameDepartment', className: 'center', orderable: false}
                ],
                 createdRow: function (row, data, index) {
           
            $('td:eq(0)', row).html(index + 1); 
        }
            });

$('#selectFormDepartment').on('change', function () {
                $tabelUsers.ajax.reload();
});
$('#dwnldBtn').on('click', function () {
                downloadExcelTable('usersTable', 'employeeData');
});

function downloadExcelTable(tableID, filename = '') {
                const linkToDownloadFile = document.
                                           createElement("a");
                const fileType = 'application/vnd.ms-excel';
                const selectedTable = document.
                                      getElementById(tableID);
                const selectedTableHTML = selectedTable.outerHTML.
                                          replace(/ /g, '%20');

                filename = filename ? filename + '.xls' : 
                           'excel_data.xls';
                document.body.appendChild(linkToDownloadFile);

                if (navigator.msSaveOrOpenBlob) {
                    const myBlob = new Blob(['\ufeff',
                                   selectedTableHTML], {
                        type: fileType
                    });
                    navigator.msSaveOrOpenBlob(myBlob, filename);
                } else {
                    // Create a link to download
                    // the excel the file
                    linkToDownloadFile.href = 'data:' + fileType + 
                                               ', ' + selectedTableHTML;
                                               // Setting the name of
                    // the downloaded file
                    linkToDownloadFile.download = filename;

                    // Clicking the download link 
                    // on click to the button
                    linkToDownloadFile.click();
                }
            }
$(document).on('click', '.assignDepartment', function () {
    var user_id = $(this).attr('data-user_id');
    console.log(user_id);
    $.ajax({
        type: "GET",
        url: '/department',
        success: function (response) {
            console.log("A mers");

            // Redirecționăm fără response în URL
            window.location.href = `/departments/${user_id}`;
        },
        error: function (response) {
            console.log("Nu A mers");
        }
    });
});


            // Event listeners for buttons
            $(document).on('click', '.editButton', function () {
                var user_id = $(this).data('user_id');
                window.location.href = '/users/edit/' + user_id;
            });

            $(document).on('click', '.deleteUser', function () {
                var user_id = $(this).data('user_id');
                $.ajax({
                    url: '/users/' + user_id,
                   method:"POST",
                    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                    success: function (response) {
                        $tabelUsers.ajax.reload();
                    },
                    error: function () {
                        alert('Failed to delete user.');
                    }
                });
            });

            $(document).on('click', '.accessButton', function () {
                var user_id = $(this).data('user_id');
                window.location.href = '/users/access/' + user_id;
            });
});
</script>

