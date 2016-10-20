<html>
	<head>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<script>

			// Testing Ajax API

			var eventData = {
				name: "New Triton Revolution",
				category_id: 1,
				country_id: 18,
				city_id: 1,
				date: '2016-01-21', // This is validating with 'date' validation rule,
				description: "Test Event",
				address_1: "My Address",
				start: "2016-01-24 21:00",
				longitude: -100,
				latitude: 80,
				tags:"tag1, tag4, hello world, cool tag",
				recurring: 1,
				recurring_data: JSON.stringify({
					'monday': {start:'12:00', 'end':'23:00'},
					'friday': {start:'12:00'},
				})
			}

			jQuery.ajax({
				headers:{
					key: 'e1f17e600eba600861c302f68ff06ea4706bdbd7' // 
				},
				method:'post',
				url:'http://localhost/Kuekur/public/api/events',
				data: eventData, 
				success:function(data){
					console.log(data);
				}
			});

		</script>
	</head>
	<body>
		
	</body>
</html>