from twilio.rest import Client 
 
account_sid = 'AC6a36d64bd3dbf03c23793d081b11fee6' 
auth_token = '[AuthToken]' 
client = Client(account_sid, auth_token) 
 
message = client.messages.create(         
                              to='+9779840595236' 
                          ) 
 
print(message.sid)