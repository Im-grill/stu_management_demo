<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
    <script src="{{ 'js/index.js' }}" defer></script>
</head>

<body>
    <div class="Animated"><h3>Greenwich University</h3></div> 
<div class="Animated"> 
  <span><h4>Student List</h4></span>
</div>

    <div class="function">
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add a student</a>
</div>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
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
                    <td>{{ $student-> id }}</td>
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