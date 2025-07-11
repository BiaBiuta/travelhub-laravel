<x-layout>
    <div class="container">
    <div id="formContainer" class="mt-4 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Access</h5>
            </div>
            <div class="card-body">
                <form id="checkForm" method="POST" enctype="multipart/form-data">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
</x-layout>