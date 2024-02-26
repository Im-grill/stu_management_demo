<head> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/edit.css') }}" />
</head>

<body>
    <div class="col-md-12 text-center">
        <h3 class="animation"> Edit a student </h3>
      </div>
<div class="form-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ url('/students/' . $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $student->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $student->email }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ $student->phone }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="1" {{ $student->gender ? 'selected' : '' }}>Male</option>
                <option value="0" {{ $student->gender ? '' : 'selected' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" id="photo" name="photo">
            <div class="currentPhoto">
            <img src="{{asset('storage/photos/'.$student->photo)}}" width="70px" height="70px" alt="Image">
            </div>
        </div>

        <div class="form-group">
            <button type="submit">Save</button>
            <a href="/students" class="btn btn-secondary">Back to Student List</a>
        </div>
    </form>
</div>
</body>