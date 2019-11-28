#!/usr/bin/env python 
# -*- coding: utf-8 -*- 
import os from flask 
import request from flask 
import Flask

secret = open('/flag', 'rb') 
os.remove('/flag') 
app = Flask(__name__) 
app.secret_key = '015b9efef8f51c00bcba57ca8c56d77a' 

@app.route('/') 
def index(): 
    return open(__file__).read() 

@app.route("/r", methods=['POST']) 
def r(): 
    data = request.form["data"] 
    if os.path.exists(data): 
        return open(data).read() 
    return '' 

if __name__ == '__main__': 
    app.run(host='0.0.0.0', port=8000, debug=False)