
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

	
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/media/images/favicon.ico">
		
		<title>Using DataTable with Editable plugin - Inline delete with ajax source</title>
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "media/css/demo_validation.css";
			@import "media/css/themes/base/jquery-ui.css";
			@import "media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
		</style>

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/jquery.jeditable.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.editable.js" type="text/javascript"></script>

		<script type="text/javascript" charset="utf-8">
		    $(document).ready(function () {
		        $('#example').dataTable()
                 .makeEditable({
                     aoTableActions: [
										{
										    sAction: "EditData",
										    sServerActionURL: "UpdateData.php",
										    oFormOptions: { autoOpen: false, modal: true }
										}
									],
                     sUpdateURL: "UpdateData.php",
                     sAddURL: "AddData.php",
                     sAddHttpMethod: "GET", //Used only on google.code live example because google.code server do not support POST request
                     sDeleteURL: "DeleteData.php",
                     sDeleteHttpMethod: "GET", //Used only on google.code live example because google.code server do not support POST request
                     aoColumns: [{}, {}, {}, {}, null]
                 });

		    });
		</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-17838786-2']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
	</head>




<body id="dt_example">
		<div id="container">
			<a href="index.html">Home</a>
			<a href="http://code.google.com/p/jquery-datatables-editable/wiki/Overview">Wiki</a> 
			<h1 class="full_width big">

				Editable DataTable example - Editing data in the popup window(Beta)
			</h1>
			
			<h2>Preamble</h2>
			<p>Editable plugin enables you to add "actions" in the table. Action can be Editing columns in the popup.
          </p>


	
		
			
			<h2>Live example</h2>

			<div id="demo">

 <form id="formEditData" action="UpdateData.php" title="Update Platforms">
		<input type="hidden" name="id" id="id"  class="DT_RowId" />
        <label for="browser">Browser</label><br />
		<input type="text" name="browser" id="browser" class="required" rel="0" />
        <br />
        <label for="platforms">Platform(s)</label><br />
		<textarea name="platforms" id="Textarea1" class="required" rel="1"></textarea>
		<br />
        <label for="version">Engine version</label><br />
		<select name="version" id="version" rel="2" multiple="multiple">
                <option>1.7</option>
                <option>1.8</option>
				<option>1.5</option>
                <option>4</option>
                <option>5</option>
				<option>5.5</option>
                <option>6</option>
                <option>7</option>
        </select>
        <br />
        <label for="grade">CSS grade</label><br />
		<input type="radio" name="grade" value="A" rel="3"> First<br>
		<input type="radio" name="grade" value="B" rel="3"> Second<br>
		<input type="radio" name="grade" value="C" rel="3"> Third
		<input type="radio" name="grade" value="X" rel="3"> The Worst
        <br />
                <label for="version">Status</label><br />
		<select name="status" id="status" rel="4">
                <option value="1">Retired</option>
                <option value="2">Live</option>
        </select>
        <br />
				<span class="datafield" style="display:none" rel="5"><a class="table-action-EditData">Edit</a></span>
				<span class="datafield" style="display:none" rel="6"><a href="/Details/DT_RowId">Details</a></span>
        <button id="formEditDataOk" type="submit">Ok</button>
		<button id="formEditDataCancel" type="button">Cancel</button>
</form>


 <form id="formAddNewRow" action="#" title="Add new record">
        <label for="browser">Browser</label><br />
	<input type="text" name="browser" id="browser" rel="0" />
        <br />
        <label for="platforms">Platform(s)</label><br />
	<textarea name="platforms" id="platforms" rel="1"></textarea>
        <br />
        <label for="version">Engine version</label><br />
	<select name="version" id="version" rel="2" multiple="multiple">
                <option>1.5</option>
                <option>1.7</option>
                <option>1.8</option>
        </select>
        <br />
        <label for="grade">CSS grade</label><br />
		<input type="radio" name="grade" value="A" rel="3"> First<br>
		<input type="radio" name="grade" value="B" rel="3"> Second<br>
		<input type="radio" name="grade" value="C" checked rel="3"> Third
        <br />
                        <label for="version">Status</label><br />
		<select name="status" id="Select1" rel="4">
                <option value="1">Retired</option>
                <option value="2">Live</option>
        </select>
        <br />
				<span class="datafield" style="display:none" rel="5"><a class="table-action-EditData">Edit</a></span>
				<span class="datafield" style="display:none" rel="6"><a href="/Details/DT_RowId">Details</a></span>
</form>

<div class="add_delete_toolbar" />

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
            <th>Status</th>
			<th>Edit</th>
		<th>Details</th></tr>
	</thead>
    <tbody>
        <tr id="101">
            <td>
                Internet Explorer 4.0
            </td>
            <td>
                Win 95+
            </td>
            <td>
                4
            </td>
            <td>
                X
            </td>
            <td>
                 Retired</td><td><a class="table-action-EditData">
                    Edit</a>
            </td>
        <td><a href="/Details/17">Details</a></td></tr>
        <tr id="102">
            <td>
                Internet Explorer 5.0
            </td>
            <td>
                Win 95+
            </td>
            <td>
                5,5.5
            </td>
            <td>
                C
            </td>
            <td>
                 Retired</td><td><a class="table-action-EditData">
                    Edit</a>
            </td>
        <td><a href="/Details/17">Details</a></td></tr>
        <tr id="103">
            <td>
                Internet Explorer 5.5
            </td>
            <td>
                Win 95+
            </td>
            <td>
                5.5
            </td>
            <td>
                A
            </td>
            <td>
                 Retired</td><td><a class="table-action-EditData">
                    Edit</a>
            </td>
        <td><a href="/Details/17">Details</a></td></tr>
        <tr id="104">
            <td>
                Internet Explorer 6
            </td>
            <td>
                Win 98+
            </td>
            <td>
                6
            </td>
            <td>
                A
            </td>
            <td>
                 Live</td><td><a class="table-action-EditData">
                    Edit</a>
            </td>
        <td><a href="/Details/17">Details</a></td></tr>
        <tr id="105">
            <td>
                Internet Explorer 7
            </td>
            <td>
                Win XP SP2+
            </td>
            <td>
                7
            </td>
            <td>
                A
            </td>
            <td>
                 Live</td><td><a class="table-action-EditData">
                    Edit</a>
            </td>
        <td><a href="/Details/17">Details</a></td></tr>
        <tr id="106">
            <td>
                AOL browser (AOL desktop)
            </td>
            <td>
                Win XP
            </td>
            <td>
                6
            </td>
            <td>
                A
            </td>
            <td>
                 Retired</td><td><a class="table-action-EditData">
                    Edit</a>
            </td>
        <td><a href="/Details/17">Details</a></td></tr>
    </tbody>
</table>

			</div>
			<div class="spacer"></div>
			<h1>Initialization code</h1>
			<p>To initialize action, the action definition in the aoTableActions array. Action definition should contain name of the action,
			URL of the server-side page that will be called, and dialog options that will be passed to the action popup dialog. </p>
			<pre>$(document).ready(function () {
	$('#example').dataTable()
			.makeEditable({
						aoTableActions: [
							{
								sAction: "EditData",
								sServerActionURL: "UpdateData.php",
								oFormOptions: { autoOpen: false, modal:true }
							}
						],
						sUpdateURL: "UpdateData.php",
						sAddURL: "AddData.php",
						sDeleteURL: "DeleteData.php",
						aoColumns: [ { } ,  { } , { } , { } , null ]									
					});
	
});		
			</pre>
			<h1>Action form</h1>
			<p>One action form that will be loaded from the form and update row cells should be defined. 
			This form should have the following properties:
			<ul>
				<li>id of the form should be  form(ACTION NAME)
				<li>Elements of the form should have rel attributes that match table cells by id
				<li>There should be ok and cancel buttons with the ids form(ACTION NAME)Ok nd form(ACTION NAME)Cancel
			</ul>
			Example is shown below:
			</p>
			
			<pre>&lt;form id=&quot;formEditData&quot; action=&quot;UpdateData.php&quot; title=&quot;Update Platforms&quot;&gt;
        &lt;label for=&quot;browser&quot;&gt;Browser&lt;/label&gt;&lt;br /&gt;
		&lt;input type=&quot;text&quot; name=&quot;browser&quot; id=&quot;browser&quot; class=&quot;required&quot; rel=&quot;0&quot; /&gt;
        &lt;br /&gt;
        &lt;label for=&quot;platforms&quot;&gt;Platform(s)&lt;/label&gt;&lt;br /&gt;
		&lt;textarea name=&quot;platforms&quot; id=&quot;Textarea1&quot; class=&quot;required&quot; rel=&quot;1&quot;&gt;&lt;/textarea&gt;
		&lt;br /&gt;
        &lt;label for=&quot;version&quot;&gt;Engine version&lt;/label&gt;&lt;br /&gt;
		&lt;select name=&quot;version&quot; id=&quot;version&quot; rel=&quot;2&quot;&gt;
                &lt;option&gt;1.5&lt;/option&gt;
                &lt;option&gt;1.7&lt;/option&gt;
                &lt;option&gt;1.8&lt;/option&gt;
				&lt;option&gt;1.5&lt;/option&gt;
                &lt;option&gt;4&lt;/option&gt;
                &lt;option&gt;5&lt;/option&gt;
				&lt;option&gt;5.5&lt;/option&gt;
                &lt;option&gt;6&lt;/option&gt;
                &lt;option&gt;7&lt;/option&gt;
        &lt;/select&gt;
        &lt;br /&gt;
        &lt;label for=&quot;grade&quot;&gt;CSS grade&lt;/label&gt;&lt;br /&gt;
		&lt;input type=&quot;radio&quot; name=&quot;grade&quot; value=&quot;A&quot; rel=&quot;3&quot;&gt; First&lt;br&gt;
		&lt;input type=&quot;radio&quot; name=&quot;grade&quot; value=&quot;B&quot; rel=&quot;3&quot;&gt; Second&lt;br&gt;
		&lt;input type=&quot;radio&quot; name=&quot;grade&quot; value=&quot;C&quot; rel=&quot;3&quot;&gt; Third
		&lt;input type=&quot;radio&quot; name=&quot;grade&quot; value=&quot;X&quot; rel=&quot;3&quot;&gt; The Worst
        &lt;br /&gt;
        &lt;button id=&quot;formEditDataOk&quot; type=&quot;submit&quot;&gt;Ok&lt;/button&gt;
		&lt;button id=&quot;formEditDataCancel&quot; type=&quot;button&quot;&gt;Cancel&lt;/button&gt;
&lt;/form&gt;		
			
			</pre>
			<h1>Starting actions</h1>
			<p>Each table row should have a link with id table-action-(ACTION NAME) that will start the action.</p>
			<h2>Other examples</h2>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="inline-edit.html">Editing cells</a></li>
				<li><a href="addingrecords.html">Adding a new record</a></li>
				<li><a href="delete-record.html">Delete records</a></li>
				<li><a href="custom-editors.html">Custom editors</a></li>
				<li><a href="inline-validation.html">Validation of inline cells</a></li>
				<li><a href="events.html">Pre-processing and post-processing events</a></li>
				<li><a href="customization.html">User interface customizations</a></li>
				<li><a href="custom-messages.html">Customization of message dialogs</a></li>
				<li><a href="customize-buttons.html">Customization of buttons and form</a></li>
				<li><a href="configure-dom.html">Two different tables on the same page</a></li>
				<li><a href="ajax.html">Using Ajax source</a></li>
			</ul>
			
			<div id="footer" style="text-align:center;">
				<span style="font-size:10px;">
					DataTables Editable &copy; Jovan Popovic 2010-2011.<br>
				</span>
			</div>
		</div>
 </body>


</html>
