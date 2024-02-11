<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ secure_asset('/css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style> 
    h1 {
    font-size: 32px;
    text-align: center;
    margin-bottom: 20px;
    letter-spacing: 2px;
}
    .btn-primary{
        float: right;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

thead {
    background-color: #f2f2f2;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #333;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

img {
    max-width: 100px;
    height: auto;
}

    </style>

</head>
<body>
    <h1> Student List </h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add a student</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->gender ? 'Male' : 'Female' }}</td>
                    <td>
                        @if($student->photo)
                            <img src="{{ asset('storage/photos/' . $student->photo) }}" alt="Student Photo" style="max-width: 100px;">
                        @else
                            No photo
                        @endif
                    </td>
                    <td>
                        

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info">Edit</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this student ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>