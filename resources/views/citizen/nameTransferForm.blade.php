@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')



<section id="fontSize" class="wrapper body-wrapper ">
   @php
$user = Session::get('user');
@endphp

<div class="container-fluid">

<div class="container mt-5">


         <!-- Success Alert -->
         @if (session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Error Alert -->
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    


        <h2 class="mb-4">Name Transfer Form</h2>
        <form action="{{route('citizen.nameTransferRequest')}}" name="name_transfer_form" id="name_transfer_form" method="POST" enctype="multipart/form-data">
            <!-- CSRF Token for security (Laravel specific) -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Cust No Field -->
            <div class="mb-3">
                <label for="cust_no" class="form-label">Customer Number</label>
                <input type="text" class="form-control" id="cust_no" name="cust_no" readonly value="{{$user['cust_no']}}">
            </div>

            <div class="mb-3">
                <label for="old_full_name" class="form-label">Old Registered Full Name</label>
                <input type="text" class="form-control" id="old_full_name" name="old_full_name" readonly value="{{$user['name']}}">
            </div>

            <!-- Full Name Field -->
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}"   required  pattern="[A-Za-z\s.]+" title="Only alphabetic characters,spaces and period are allowed.">
                @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- File Uploads
            <div class="mb-3">
                <label for="file1" class="form-label">Upload File 1</label>
                <input class="form-control" type="file" id="file1" name="file1">
            </div>

            <div class="mb-3">
                <label for="file2" class="form-label">Upload File 2</label>
                <input class="form-control" type="file" id="file2" name="file2">
            </div>

            <div class="mb-3">
                <label for="file3" class="form-label">Upload File 3</label>
                <input class="form-control" type="file" id="file3" name="file3">
            </div> -->

            <!-- Submit Button -->
             <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit Request for Name Transfer</button>
            </div>
        </form>
    </div>


</div>



</section>
@include('master_theme/footer')
</body>
</html>


