<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Show Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>
<body>



    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-center text-decoration-underline mb-5">Contact Details</h2>

                <p><strong>Name: </strong>{{ $contact->name }}</p>
                <p><strong>Email: </strong>{{ $contact->email }}</p>
                <p><strong>Phone: </strong>{{ $contact->phone }}</p>
                <p><strong>Address: </strong>{{ $contact->address }}</p>
            </div>
        </div>

        <a href="{{ route('index.contact') }}"><button class="mt-4 btn btn-primary">Back to Contacts</button></a>

    </div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
