<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5 ">
    <div class="row">
        <h1 class="text-center text-decoration-underline mb-5">All Contacts</h1>


            <div class="row">
                <form action="{{ route('sort.contact') }}" method="get">
                <div class="col-sm-2">

                        <select class="form-select" name="sort_by">
                            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created At</option>
                        </select>
                </div>

                <div class="col-sm-2 mt-2">
                    <select class="form-select" name="sort_direction">
                        <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>
                        <button class="btn btn-primary mt-2" type="submit">Sort</button>
                    </form>
            </div>


            <div class="row">
                <div class="col-sm-5 mt-4">
                    <form method="GET" action="{{ route('search.contact') }}" class="d-flex" role="search">
                        <input class="form-control me-2" type="text" name="search" placeholder="Search by name or email">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-3 mt-5">
                <a href="{{ route('create.contact') }}"><button type="button" class="btn btn-success">Add Contact</button></a>
            </div>
        </div>

        <div class="row">

                <table class="table table-secondary table-hover mt-5">
                    <thead class="table table-info text-center">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th colspan="5">Actions</th>
                    </tr>
                    </thead>

                    <tbody class="text-center">

                        @php
                            $i = 1;
                        @endphp

                        @if(count($allContacts) > 0)
                            @foreach($allContacts as $contacts)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $contacts->name }}</td>
                            <td>{{ $contacts->email }}</td>
                            <td>{{ $contacts->phone }}</td>
                            <td>{{ $contacts->address }}</td>
                            <td>{{ $contacts->created_at }}</td>
                            <td>
                                <a href="{{ route('show.contact', $contacts->id) }}"><button class="btn btn-primary">View</button></a>
                                <a href="{{ route('edit.contact', $contacts->id) }}"><button class="btn btn-warning">Edit</button></a>
                                <form action="{{ route('delete.contact', $contacts->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>


                            @endforeach

                        @else
                            <tr>
                                <td colspan="8" class="text-center">Contact Not Found</td>
                            </tr>

                        @endif
                    </tbody>
                </table>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
