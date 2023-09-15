

from __future__ import print_function
from pkg_resources import resource_string
from jenkinsapi.jenkins import Jenkins
from jenkinsapi.utils.crumb_requester import CrumbRequester
import xml.etree.ElementTree as et
from flask import Flask, request, jsonify
from sklearn.externals import joblib

app = Flask(__name__)

@app.route("/")
def home():
    return "Hello, World!"

@app.route('/jenkins_create',methods=['POST'])
def job_build():
    json_ = request.json
    job_name=json_['repo_name']
    fhand=open('examples/addjob.xml','r')
    xml=fhand.read()
    jenkins = Jenkins(
    'http://localhost:8080', username='hardik', password='test123',
    requester=CrumbRequester(
        baseurl='http://localhost:8080',
        username='hardik',
        password='test123'
        ))
    job = jenkins.create_job(jobname=job_name, xml=xml)
    my_job = jenkins[job_name]
    jenkins.build_job(job_name)
        
@app.route('/jenkins_update',methods=['POST'])
def job_update():

    jenkins = Jenkins(
    'http://localhost:8080', username='hardik', password='test123',
    requester=CrumbRequester(
        baseurl='http://localhost:8080',
        username='hardik',
        password='test123'
    )) 
    
    json_ = request.json
    job_name=json_['repo_name']
    my_job = jenkins[job_name]
    myConfig=my_job.get_config()
    fhand=open('examples/addjob.xml','r')
    xml=fhand.read()
    rep = myConfig.replace(myConfig, xml)
    my_job.update_config(xml)
    

if __name__ == '__main__':
    port = 3000 
    app.run(port=port, debug=True)
