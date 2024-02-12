<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .animation{
            user-select: none;
            cursor: default;
    text-transform: uppercase;
    background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
      font-size: 50px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
    </style>
    

</head>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                  <div class="col-md-12 text-center">
                    <h3 class="animation"> Add a student </h3>
                  </div>
                  
            <form action="/students" method="POST" enctype="multipart/form-data">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/students" class="btn btn-secondary">Back to Student List</a>
            </form>
            
        </div>
    </div>
</div>