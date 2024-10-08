<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Data</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .btn-custom {
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        .btn-back:hover {
            background-color: #5a6268;
            color: white;
        }
        .btn-submit {
            background-color: #198754;
            color: white;
        }
        .btn-submit:hover {
            background-color: #157347;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select {
            width: 50%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .state-dropdown {
            display: none; /* Initially hide the state dropdown */
            margin-top: 20px;
			margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="todo_show"><button type="button" class="btn btn-custom btn-back mt-4 ms-5">Back</button></a>
        
        <form class="mt-4" method="post" action="todo_submit">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
			
			<div class="container1">
			
                  <label for="country">Country:</label>
                  <select id="country" name="country_name">
                      <option value="">Select Country</option>
                      <option value="India">India</option>
                      <option value="USA">USA</option>
                      <option value="Canada">Canada</option>
                  </select>
	           
                  <label for="state">State:</label>
                  <select id="state" name="state_name">
                      <option value="">Select State</option>
                  </select>
	           
                  <label for="stateid">State ID:</label>
                  <select id="stateid" name="state_id">
                      <option value="">Select State ID</option>
                  </select>
            </div>
	
            <div class="mb-3">
                <label for="location" class="form-label">Area</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
			
            <button type="submit" class="btn btn-custom btn-submit mt-4 ms-5" name="submit">Submit</button>
        </form>
    </div>

    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-FTT4H10XkTXuDJYFGhZr2G1oI1RAzZK2vf4AnBoztdWYfG2My3IvAfm+x8tWv3H5z" crossorigin="anonymous"></script>
     <script>
        // Data for countries, states, and their corresponding IDs
        const countryStateData = {
            'India': [
			    {name: 'Maharashtra', id: 'MH'},
                {name: 'UttarPradesh', id: 'UP'},
                {name: 'Andra Pradesh', id: 'AP'},
                {name: 'Karnataka', id: 'KA'},
				{name: 'Punjab', id: 'PN'}
            ],
			'USA': [
                {name: 'California', id: 'CA'},
                {name: 'Texas', id: 'TX'},
                {name: 'Florida', id: 'FL'}
            ],
            'Canada': [
                {name: 'Ontario', id: 'ON'},
                {name: 'Quebec', id: 'QC'},
                {name: 'British Columbia', id: 'BC'}
            ]
        };

        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const stateIdSelect = document.getElementById('stateid');

        // Update state dropdown based on selected country
        countrySelect.addEventListener('change', function() {
            const selectedCountry = this.value;
            stateSelect.innerHTML = '<option value="">Select State</option>';
            stateIdSelect.innerHTML = '<option value="">Select State ID</option>'; // Reset state ID dropdown

            if (selectedCountry) {
                const states = countryStateData[selectedCountry];
                states.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.name;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });
            }
        });

        // Update state ID dropdown based on selected state
        stateSelect.addEventListener('change', function() {
            const selectedCountry = countrySelect.value;
            const selectedState = this.value;
            stateIdSelect.innerHTML = '<option value="">Select State ID</option>'; // Reset state ID dropdown

            if (selectedState) {
                const states = countryStateData[selectedCountry];
                const state = states.find(s => s.name === selectedState);
                if (state) {
                    const option = document.createElement('option');
                    option.value = state.id;
                    option.textContent = state.id;
                    stateIdSelect.appendChild(option);
                }
            }
        });
    </script>
	</body>
</html>
