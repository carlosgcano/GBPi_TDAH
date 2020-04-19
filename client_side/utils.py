class Utils(object):

	def get_subjects():
	    return 6

	def get_points():
	    return 32

	def get_medal_value_from_server():
	    return 3

	def get_trophy_value_from_server():
	    return 3

	def get_trophies_and_medals_from_points():
		total_points, trophies_value, trophies_points, medals_value, medals_points = 0,0,0,0,0
		
		trophies_value = Utils.get_trophy_value_from_server()
		medals_value = Utils.get_medal_value_from_server()
		
		total_points = Utils.get_points()
		trophies_points = total_points//( trophies_value * medals_value )
		medals_points = (total_points%( trophies_value * medals_value ))//medals_value
		print("total points:"+str(total_points))
		print("trophies points:"+str(trophies_points))
		print("medals value:"+str(medals_value))
		print("calculo total:"+str(total_points%( trophies_points * medals_value )))
		print("medals points:"+str(medals_points))
		return trophies_points, medals_points

