<head> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style> 
h2{text-align: center;}
.form-container {
    width: 50%;
    margin: 0 auto;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group select {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group button {
    padding: 0.5rem 1rem;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-group button:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>
<h2>Edit a student</h2>
<div class="form-container">
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
            <input type="file" id="image" name="image">
        </div>

        <div class="form-group">
            <button type="submit">Save</button>
            <a href="/students" class="btn btn-secondary">Back to Student List</a>
        </div>
    </form>
</div>
</body>