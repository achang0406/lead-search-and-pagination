<html>
<head>
	<title>Home</title>
	<style type="text/css">
	*{
		/*outline: 1px solid silver;*/
	}
	#container{
		padding: 50px;
		border: 1px solid black;
		width: 900px;
	}
		form{
			margin-bottom: 50px;
		}
			#from{
				margin-left: 200px;
				margin-right: 50px;
			}
			form #date{
			}
		ul{
			margin-left: 600px;
		}
			ul li{
				display: inline-block;
				list-style-type: none;
			}
			li a{
				padding-right: 10px;
				padding-left: 5px;
				border-right: 1px solid black;
				text-decoration: none;
			}
			li a:last-child{
				border-right: none;
			}
		table{
			border: 1px solid black;
			margin: auto;
		}
			#header{
				background-color: gray;
			}
			td{
				padding: 0px 10px;
				border-right: 1px solid black;
			}
			td:last-child{
				border: none;
			}
			#id{
				width: 10%;
			}
			#name{
				width: 15%;
			}
			#datetime{
				width: 30%;
			}
			#email{
				width: 30%;
			}
	</style>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				$.get('mains/index_html', function(res){
					$('#lead_table').html(res);
				});

				//filter names and dates
				$('input').keyup(function(){

					$.post('/mains/ultimate_leads', $('#filters').serialize(), function(res){
							$('#lead_table').html(res);
					});				
				});	

				//pagination
				$('#lead_table').on('click', 'form.page ', function()
				{
					$.post('/mains/ultimate_pages/', $(this).serialize(), function(res){
						$('#lead_table').html(res);
					});
					return false;
				});

			});
		</script>
</head>
<body>
	<div id='container'>
		<form id='filters' action='' method='post'>
			<label id='name'><span>Name:</span><input type='text' name='name'></label>
			<label id='from'><span>From:</span><input type='date' name='from'></label id='date'>
			<label><span>Date:</span><input type='date' name='date'></label>
		</form>
		<div id='lead_table'></div>
	</div>
</body>
</html>