# -*- coding: utf-8 -*-
"""
Created on Fri Jul 26 15:24:52 2019

@author: lekha_7owx93z
"""

from __future__ import print_function
from pkg_resources import resource_string
from jenkinsapi.jenkins import Jenkins
from jenkinsapi.utils.crumb_requester import CrumbRequester
import xml.etree.ElementTree as et
from flask import Flask, request, jsonify
from sklearn.externals import joblib

# =============================================================================
# new_conf = my_job.get_config()
# 
# root = et.fromstring(new_conf.strip())
# 
# 
# scm=root.find('scm')
# userRemoteConfigs= et.SubElement(scm, 'userRemoteConfigs')
# hudson=et.SubElement(userRemoteConfigs, 'hudson.plugins.git.UserRemoteConfigs')
# url= et.SubElement(hudson, 'url')
# url.text="https://github.com/RAKSHITA-PR/sample.git"
# 
# 
# builders = root.find('builders')
# shell = et.SubElement(builders, 'hudson.tasks.Shell')
# command = et.SubElement(shell, 'command')
# command.text = "python hello-world.py"
# my_job.update_config(new_conf)
# #11fe183ae27a47affc1b78c2f1a6fffde4
# 
# print(et.tostring(root))
# =============================================================================
# -*- coding: utf-8 -*-
"""
Created on Tue Jan 22 00:38:36 2019

@author: lekha_7owx93z
"""

# -*- coding: utf-8 -*-
"""
Created on Tue Jan 22 00:31:39 2019

@author: lekha_7owx93z
"""

# -*- coding: utf-8 -*-
"""
Created on Sun Jan 20 11:57:29 2019

@author: lekha_7owx93z
"""

# Your API definition
app = Flask(__name__)

@app.route('/jenkins', methods=['POST'])
def job_build():
    json_ = request.json
    job_name="xjc"
    xml = resource_string('examples', 'addjob.xml')
    jenkins = Jenkins(
    'http://localhost:8080', username='lekhana0330', password='lekhana1234',
    requester=CrumbRequester(
        baseurl='http://localhost:8080',
        username='lekhana0330',
        password='lekhana1234'
        ))
    job = jenkins.create_job(jobname=job_name, xml=xml)
    my_job = jenkins[job_name]
    jenkins.build_job(job_name)
        

if __name__ == '__main__':
    port = 12346 # If you don't provide any port the port will be set to 12345
    app.run(port=port, debug=True)



