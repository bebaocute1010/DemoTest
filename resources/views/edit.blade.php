<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <title>Student Edit</title>
    <style>
        form{
            max-width: 1150px;
            margin: auto;
        }
        header {
            text-align: center;
            font-size: 30px;
            color: white;
            background-color: black;
            margin-bottom: 20px;
            padding: 10px;
        }
        button{
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <header>Student Edit</header>
    <?php 
        use App\Models\Student;
            $id = $_GET["id"];
            $st = new Student();
            $result = $st->get_student_by_id($id);
    ?>
    <form action="student" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input name="_id" type="text" class="form-control" id="id" value="{{$result->id}}" readonly>
          </div>
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input name="_fullname" type="text" class="form-control" id="fullname" placeholder="Full Name" value="{{$result->fullname}}">
        </div>
        <div class="form-group">
          <label for="birthday">BirthDay (MM/dd/yyyy)</label>
          <input name="_birthday" type="date" class="form-control" id="birthday" placeholder="BirthDay" value="{{$result->birthday}}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input name="_address" type="text" class="form-control" id="address" placeholder="Address" value="{{$result->address}}">
          </div>
        <button name="Submit" type="submit" class="btn btn-primary" value="edit">Update</button>
      </form>
    
</body>
</html>