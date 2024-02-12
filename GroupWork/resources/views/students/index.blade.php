<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ secure_asset('/css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
<script>
        document.addEventListener("DOMContentLoaded", function() {
          const animatedDivs = document.querySelectorAll('.Animated');
          animatedDivs.forEach((div, index) => {
            div.classList.add('animated-showup');
            if (index === animatedDivs.length - 1) {
              div.classList.add('animated-reveal');
              const span = div.querySelector('span');
              span.parentElement.classList.add('animated-slidein');
            }
          });
        });
      </script>
<style> 
    h3{color:rgb(53, 255, 53);} h4{color:#c44949}
    @import url('https://fonts.googleapis.com/css?family=Roboto:300');

    body {
        user-select: none;
        cursor: default;
        text-align:center;
    }
    .Animated {
        display:inline-flex;
        overflow:hidden;
        white-space:nowrap;
    }

    .animated-showup {  
        animation: showup 7s infinite;
    }

    .animated-reveal {
        width:0px;
        animation: reveal 7s infinite;
    }

    .animated-slidein span {
        margin-left:-355px;
        animation: slidein 7s infinite;
    }

    @keyframes showup {
        0% {opacity:0;}
        20% {opacity:1;}
        80% {opacity:1;}
        100% {opacity:0;}
    }

    @keyframes slidein {
        0% { margin-left:-800px; }
        20% { margin-left:-800px; }
        35% { margin-left:0px; }
        100% { margin-left:0px; }
    }

    @keyframes reveal {
        0% {opacity:0;width:0px;}
        20% {opacity:1;width:0px;}
        30% {width:355px;}
        80% {opacity:1;}
        100% {opacity:0;width:355px;}
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

    r:nth-child(even) {
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