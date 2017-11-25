import botometer
import MySQLdb

db = MySQLdb.connect(host="localhost", user="root", passwd="", db="twitter")
cursor = db.cursor()

cursor.execute("SELECT id_seguidor FROM relacionamento")
data = cursor.fetchall()
array = []
user = []
y = 0

for val in range(len(data)):
    cursor.execute("SELECT id_user FROM json_botometer   WHERE id_user = %s", data[val])
    aux = cursor.fetchall()
    if not aux:
        for x in data[val]:
            if y != x:
                y = x
                user.append(y)
                print(y, 'Este vamos gravar')
    else:
        print(aux, 'Este já esta gravado')

mashape_key = "UtsZRmBoUemshJJgNodC6470QQmvp1ipISfjsnqmNnrtwbplzB"
twitter_app_auth = {
    'consumer_key': 'oBl2W04bnG1PVXNvGqwiKyb4Q',
    'consumer_secret': 'NNcZEyyvEJEaMnYsKCc3fdhqAgHBuq2NkWQyAAawk7gAG4hJBZ',
    'access_token': '313648213-xuPWDguAhDMGGVAlpiqw0dPzlFhyKtBvgZoQrgNJ',
    'access_token_secret': 'Fxja3YODhDe80YbtQefXAW96yOYM1WcO7lOQh4Ahna9zr',
}
bom = botometer.Botometer(wait_on_ratelimit=True,  mashape_key=mashape_key,   **twitter_app_auth)

for id_user, json in bom.check_accounts_in(user):
    print('id_user')
    cursor.execute("INSERT INTO json_botometer (id_user, json_extra) VALUES (%s, %s)", [str(id_user), str(json)])
    db.commit()

