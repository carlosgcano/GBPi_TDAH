import urllib.request, json

class Utils(object):

	def get_all():
		address = "http://localhost/api/"
		url=urllib.request.urlopen(address)
		data = json.loads(url.read().decode())
		return data

	def get_subjects(data):
		return data['items'][0]['n_subj']

	def get_actitudes(data):
		return data['items'][0]['n_act']

	def get_points(data):
	    return data['items'][0]['total_points']

	def get_medal_value_from_server(data):
	    return data['items'][0]['n_medal']

	def get_trophy_value_from_server(data):
	    return data['items'][0]['n_trophy']

	def get_trophies_and_medals_from_points(total_data):
		total_points, trophies_value, trophies_points, medals_value, medals_points = 0,0,0,0,0

		trophies_value = int(Utils.get_trophy_value_from_server(total_data))
		medals_value = int(Utils.get_medal_value_from_server(total_data))
		
		total_points = int(Utils.get_points(total_data))
		trophies_points = total_points//( trophies_value * medals_value )
		medals_points = (total_points%( trophies_value * medals_value ))//medals_value
		print("total points:"+str(total_points))
		print("trophies points:"+str(trophies_points))
		print("medals value:"+str(medals_value))
		print("calculo total:"+str(total_points%( trophies_points * medals_value )))
		print("medals points:"+str(medals_points))
		return trophies_points, medals_points

	def generate_subjects_for_pie(total_data):
		subjects = int(Utils.get_subjects(total_data))
		subject= 100/subjects
		res=[subject] * subjects
		return res

	def generate_actitudes_for_pie(total_data):
		actitudes = int(Utils.get_actitudes(total_data))
		actitude= 100/actitudes
		res=[actitudes] * actitudes
		return res

	def get_subjects_colors(data):
	    #return data['items'][0]['n_trophy']

	def get_actitudes_colors(data):
	    #return data['items'][0]['n_trophy']