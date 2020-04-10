<div class="container block">
    <!-- Filter, this is ued to filter the employees, used to search employees, filt employees by age, name, gender -->

    <div class="h-10 row">
        <div class="col">
            <input class="searchinput" type="text" id="myInput" onkeyup="filter()" placeholder="Search by names..">
        </div>
        <div class="col">
            <input class="searchinput" type="text" id="ageInput" onkeyup="filter()" placeholder="Search by age..">
        </div>

	<div class="btn-toolbar col justify-content-center align-items-center" data-toggle="buttons" >
	    <label class = "btn ml-1" style="background-color: lightgrey;">
		<input onclick="filter()" type="radio" name="options" id="gender-default" checked="checked" >Default
	    </label>
	    
	    <label class = "btn btn-primary ml-1 " >
		<input onclick="filter()" type="radio" name="options" id="gender-male">Male
	    </label>

	    <label class = "btn ml-1" style="background-color: #c95eb1;">
		<input onclick="filter()" type="radio" name="options" id="gender-female">Female
	    </label>
	    

	</div>

    </div>
</div>
