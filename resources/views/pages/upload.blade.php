<x-layout>
    <div class="container">
    <div id="formContainer" class="mt-4 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add New Post</h5>
            </div>
            <div class="card-body">
                <form id="uploadForm" method="POST" action="/posts" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" class="form-control" cols="40" rows="2" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary uploadButton">Upload</button>
                    <!-- <button type="button" class="btn btn-secondary" id="hideFormBtn">Close</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
</x-layout>