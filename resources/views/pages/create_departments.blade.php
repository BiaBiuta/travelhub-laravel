<x-layout>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-8 w-100 mx-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create Department</h1>
                                </div>
                                <form id="formCreateDepartaments" class="user" method="POST" action="/department">
                                    @csrf
                                    @method("POST")
                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user"
                                            name="name" id="name" aria-describedby="nameHelp"
                                            placeholder="Enter Name">
                                        <p id="errors_name" class="small"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control form-control-user"
                                            name="description"
                                            id="description" placeholder="Description">
                                        </textarea>
                                    </div>
                                    <button id="registerDepartmentButton" type=" submit" class=" btn btn-primary btn-user btn-block">
                                        Register Department
                                    </button>

                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</x-layout>
