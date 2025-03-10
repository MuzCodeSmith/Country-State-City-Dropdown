<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Add more</title>
</head>
<body>
    <div class="container d-flex justify-content-center pt-5" >
        <div class="col-md-9" >
            <h2 class="text-center pb-3 text-danger">Add Or More Multiple</h2>

            <form action="/add-more" method="POST">
                @csrf

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{Session::get('success')}}</p>
                    </div>
                @endif
            </form>

            <table class="table table-bordered" id="table">
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="inputs[0][name]" placeholder="Enter Your Name" class="form-control" ></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>

            </table>

            <button type="submit" class="btn btn-primary col-md-2">save</button>

        </div>
    </div>
  
    <script>
        var i=0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `
                <tr>
                <td>
                <input type="text" name="inputs[`+i+`][name]" placeholder="Enter Your Name" class="form-control" />
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                </td>
                </tr>
                `);

            $(document).on('click','.remove-table-row',function(){
                $(this).parents('tr').remove();
            });
        })
    </script>
    
</body>
</html>