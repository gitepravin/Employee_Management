<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <style>
            .flex-center {
                display: flex;
                justify-content: center; 
                align-items: center;     
                height: auto;
            }

            table {
                border: 1px solid black;
                border-collapse: collapse;
				width:auto;
				margin-top:20px;
				
            }

            th {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
             td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
			
			button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff; 
            color: white; 
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border: 1px solid #a71d2a;			
        }

        .btn-danger {
            background-color: #dc3545; 
            color: white; 
        }

        .btn-danger:hover {
            background-color: #c82333; 
			border: 1px solid #a71d2a;
        }

       
        button a {
            color: white; 
            text-decoration: none; 
        }
		
		.custom-button {
             margin-top: 20px;
			 margin-bottom: 5px;
            margin-left: 42px;
        }

        .w-5.h-5{
            width: 25px;
        }
        
        .arrowc{
            margin-top: 20px;
            margin-left:30px;
        }

        .text-sm{
            margin-top: 5px;
            margin-bottom: 8px;
        }

        </style>
    </head>
    <body>
	<button  class="button btn btn-success custom-button"><a href="todo_create">Add Record</a></button>
	    {{session('msg')}}
	    </br>
        <div class="flex-center position-ref full-height">
            <table>
                <tr>
					<th>Country_ID</th>
					<th>State ID</th>
                    <th>Name</th>
                    <th>Created At</th>
					<th>Updated At</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Age</th>
					<th>Area</th>
                    <th>Action</th>
                </tr>
                @foreach($todoArr as $todo)
                <tr>
				 <td>{{ $todo->country_id }}</td>
				 <td>{{ $todo->state_id }}</td>
                 <td>{{ $todo->name }}</td>
                 <td>{{ get_formatted_date($todo->created_at, "d-M-Y H:i:s") }}</td>
				 <td>{{ get_formatted_date($todo->updated_at, "d-M-Y H:i:s") }}</td>
				 <td>{{ $todo->mobile }}</td>
				 <td>{{ $todo->email }}</td>
				 <td>{{ $todo->age }}</td>
				 <td>{{ $todo->location }}</td>
				 <td><button  class="button btn-primary"><a href="todo_edit/{{$todo->country_id}}">Edit</a></button><button  class="button btn-danger"><a href="todo_delete/{{$todo->country_id}}">Delete</a></button></td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
        <div class="arrowc">
            {{ $todoArr->links() }}
        </div>
        </div>
    </body>
</html>
