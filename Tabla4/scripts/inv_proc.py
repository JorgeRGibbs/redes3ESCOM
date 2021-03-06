import MySQLdb
import os
import sys
import datetime

def create_database():
	#database connection
	os.system('sudo service mysql start')
	os.system('sudo service mysql.server start')
	database = MySQLdb.connect (host="10.100.64.50", user = "netuser", passwd = "123") #connection user and password have been hardcoded given
																				  #the nature of the excercise. I'm aware credentials should be 
																				  #encrypted or secured for security reasons.
	cursor = database.cursor()													  
	cursor._defer_warnings = True
	if cursor.execute("select schema_name from information_schema.schemata where schema_name = 'redes3proj';") == 1:
		pass
	else:
		for line in open('db'):
			#print('DEBUG:',line) #debug
			cursor.execute(line)
		print('DEBUG: Database is up')

def process_inv_file(router):
	d = {}
	dict_list = []
	data = ['NAME','DESCR','PID','VID','SN']
	print(router)
	path='../inventory/'+router+''
	print(path)
	#try:
	with open (path, 'rt') as file:  
		for line in file:                 
			#print(line)                     
			for x in data:
				pos = line.find(x)
				if pos != -1 : #Attribute found
					startIndex = (line[pos:].find('\"')+1+pos)
					if startIndex > 0: #i.e. if the first quote was found
						endIndex = line.find('\"', startIndex + 1)
						if startIndex != -1 and endIndex != -1: #i.e. both quotes were found
							param = line[startIndex:endIndex]
							#print(x,':',param)
							if not param:
								param = 'N/A'
							d[x] = param
						else:
							index = (line[startIndex:].find(' ')+1+startIndex)
							endIndex = (line[index:].find(' ')+1+startIndex)
							param = line[index:endIndex]
							if not param:
								param = 'N/A'
							else:
								pass
							#print(x,':',param)
							d[x]= param
					elif startIndex == 0:
						#print(startIndex)
						startIndex = (line[pos:].find(' ')+1+pos)
						if startIndex != -1: 
							endIndex = line.find(' ',startIndex + 1)
							#print(endIndex)
							if startIndex != -1 and endIndex != -1: 
								param = line[startIndex:endIndex]
								if not param:
									param = 'N/A'
								#print(x,':',param)
								d[x]= param
								#print(param)
						else: 
							if not param:
								param = 'N/A'
							d[x]= param
					if x == 'SN':
						#dict_list.append(d)
						#print(d)
						Load(d,router)
				else:
					pass
		else:
			if os.path.getsize(path) < 4000:
				print('ERROR: Inventory file for router ' +router+ ' not fetched correctly !')		
				return 0
	file.close()
		#os.system('mysql --host localhost --user root --password=root -D snmp -e "select * from snmp.inventario;"')
	#except:
	#	print('ERROR: Inventory file for router ' +router+ ' not found !')
	#	return 0

def Load(args,router):#Loads data into several tables
	#Building a query 
	now = datetime.datetime.now()
	date = now.strftime("%Y-%m-%d %H:%M")
	#database = MySQLdb.connect (host="localhost", user = "root", passwd = "root")																	  																				  
	database = MySQLdb.connect (host="10.100.64.50", user = "netuser", passwd = "123") 
	cursor = database.cursor()	
	cursor._defer_warnings = True
	query = 'select idDispositivo from redes3proj.Dispositivo WHERE nombre = "'+router+'"'
	cursor.execute(query)
	ret = cursor.fetchall()
	id = int(ret[0][0])
	query = "INSERT INTO redes3proj.Inventario (hostname,nombre,descripcion,pid,vid,ns,fecha,Dispositivo_idDispositivo)" \
			"VALUES ( %s, %s, %s, %s, %s, %s, %s , %s )"
	args = (router,args['NAME'],args['DESCR'],args['PID'],args['VID'],args['SN'],date,id)
	cursor.execute(query,args)
	print(cursor._last_executed)
	database.commit()
	database.close()


def main():
	create_database()
	process_inv_file(sys.argv[1])

if __name__ == '__main__':
	main()