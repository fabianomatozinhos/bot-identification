import botometer
#import MySQLdb # para o MySQL

#db = MySQLdb.connect(host="localhost", user="root", passwd="", db="twitter")
#cursor = db.cursor()

#cursor.execute("SELECT * FROM relacionamento")
# Conta o numero de linhas na tabela
#numrows = int(cursor.rowcount)

#print(numrows)
mashape_key = "UtsZRmBoUemshJJgNodC6470QQmvp1ipISfjsnqmNnrtwbplzB"
twitter_app_auth = {
    'consumer_key': 'oBl2W04bnG1PVXNvGqwiKyb4Q',
    'consumer_secret': 'NNcZEyyvEJEaMnYsKCc3fdhqAgHBuq2NkWQyAAawk7gAG4hJBZ',
    'access_token': '313648213-xuPWDguAhDMGGVAlpiqw0dPzlFhyKtBvgZoQrgNJ',
    'access_token_secret': 'Fxja3YODhDe80YbtQefXAW96yOYM1WcO7lOQh4Ahna9zr',
  }

bom = botometer.Botometer(wait_on_ratelimit=True,  mashape_key=mashape_key,   **twitter_app_auth)

# Check a single account
result = bom.check_account('@wowsant')
print(result)