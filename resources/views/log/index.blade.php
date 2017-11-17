@extends('layout.layout')

@section('content')

<!-- <div class='container'>
	<button id='btn'>Row Count</button>
	<br>
	<br>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>

    </table>
</div> -->
<div class="container">
    <div id="toolbar">
        <button id="button" class="btn btn-default">getData</button>
    </div>
    <table id="table"
           data-toggle="table"
           data-toolbar="#toolbar"
           data-height="460"
           data-side-pagination="server"
           data-pagination="true"
           data-method ='get'
           data-url="http://localhost/leolaravel/public/api/log">
	    <thead>
		    <tr>
		        <th data-field="method">ID</th>
		        <th data-field="date_time">date_time</th>
		        <th data-field="ip">IP</th>
		    </tr>
	    </thead>
    </table>
</div>
<script type="text/javascript">





$(document).ready(function() {
//     var table = $('#example').DataTable();
 
//     $('#example tbody').on( 'click', 'tr', function () {
//         $(this).toggleClass('selected');
//     } );
 
//     $('#btn').click( function () {
//         alert( table.rows('.selected').data().length +' row(s) selected' );
//     } );
// } );	
//     $('#example').DataTable( {
//     	// "ajax": "data/arrays.txt"
    } );

</script>
@stop
