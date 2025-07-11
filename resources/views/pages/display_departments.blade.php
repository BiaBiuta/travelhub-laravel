<x-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered nowrap" id="dataDepartmentTable" width="100%" cellspacing="0">
                    <thead id="departmentsTable">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
            </div>
        </div>
        <div id="alertDiv" class=" alert alert-warning  alert-dismissible fade show" hidden role="alert">
            <strong>S-a sters cu succes</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

</div>
</x-layout>
<script>
$(document).ready(function () {
        // Extragem datele din variabila PHP (sesiune) și le folosim pentru a popula DataTable
        var departmentsData = {!! json_encode(session('departmentsData')) !!};
        console.log(departmentsData);
        var $tabelUsers = $('#dataDepartmentTable').DataTable({
            pageLength: 25,
            ajax: {
                    url: '/departments/{id}',
                    data: function (d) {
                        d.department_id = $('#selectFormDepartment').val();
                    }
                },
            data: departmentsData, // Folosim datele preluate din sesiune
            columns: [
                
                { data: 'name', className: 'center', title: 'Name', sortable: false },
                { data: 'description', className: 'center', title: 'Description', sortable: false }
            ],
            columnDefs: [
                { orderable: false, targets: [0, -1] }
            ],
            createdRow: function (row, data, index) {
           
            $('td:eq(0)', row).html(index + 1); 
        }
        });
    });
function verify_function(string_access, id) {
    console.log("Am intrat in functie");
    var elements = [];
    elements = string_access.split(",");
    var ok = false;
    for (i = 0; i < elements.length; i++){
        console.log(elements[i]);
        if (elements[i] == id) {
            ok = true;
        }
    }
    return ok;
}

</script>