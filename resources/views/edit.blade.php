<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>
<body>
<!-- Contact -->
<div class="container">
    <h3 class="mt-3 text-center fw-bold">Edit Contact</h3>

    <form action="{{ route('update.contact', $contactEdit->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label mb-2 mt-5 fw-bolder">Name</label>
            <input type="text" name="name" value="{{ $contactEdit->name }}" class="form-control" />
        </div>
        <div class="mb-3">
            <label class="form-label mb-2 fw-bolder">Email</label>
            <input type="email" name="email" value="{{ $contactEdit->email }}" class="form-control" />
        </div>
        <div class="mb-3">
            <label class="form-label mb-2 fw-bolder">Phone</label>
            <input type="number" name="phone" value="{{ $contactEdit->phone }}" class="form-control" />
        </div>
        <div class="mb-3">
            <label class="form-label mb-2 fw-bolder">Address</label>
            <textarea name="address" cols="30" rows="2" class="form-control" >{{ $contactEdit->address }}</textarea>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary">Update</button>
        </div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
