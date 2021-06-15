import requests
import json
import sys
import urllib
import time

def json_message(link):

    headers = {'API-Key':'2d2f24e4-74b0-4e09-9d23-a543d3e9ee2d','Content-Type':'application/json'}
    data = {"url": link, "visibility": "public"}
    response = requests.post('https://urlscan.io/api/v1/scan/',headers=headers, data=json.dumps(data))
    return response.json()

if __name__ == '__main__' :

    result = json_message(sys.argv[2])

    if result['message'] == "Submission successful":

        api = result['api']

        time.sleep(40)

        response_api = requests.get(api)
        result2 = response_api.json()
        arg = sys.argv[1]

        if arg == "2" :

            remote_address = result2['data']['requests'][0]['response']['response']['remoteIPAddress']
            remote_port = result2['data']['requests'][0]['response']['response']['remotePort']
            remote_secure_state = result2['data']['requests'][0]['response']['response']['securityState']

            if 'securityDetails' in result2['data']['requests'][0]['response']['response']:

                remote_secure_protocol = result2['data']['requests'][0]['response']['response']['securityDetails']['protocol']
                remote_secure_cipher = result2['data']['requests'][0]['response']['response']['securityDetails']['cipher']

                try:

                    your_url = result2['data']['requests'][0]['requests'][0]['documentURL']
                    redirected_url = result2['data']['requests'][0]['requests'][1]['documentURL']
                    screenshot = result2['task']['screenshotURL']

                    print('urlscan.io:<br><br>Your link: {}<br><br>Link redirected: {}<br><br>Remote address: {}<br><br>Remote port: {}<br><br>Remote secure state: {}<br><br>Remote secure protocol: {}<br><br>Remote secure cipher: {}'.format(your_url, redirected_url, remote_address, remote_port, remote_secure_state, remote_secure_protocol, remote_secure_cipher))

                except KeyError:

                    your_url = result2['data']['requests'][0]['request']['documentURL']

                    print("Results of urlscan.io:<br><br>Link: {}<br><br>Remote address: {}<br><br>Remote port: {}<br><br>Remote secure state: {}<br><br>Remote secure protocol: {}<br><br>Remote secure cipher: {}".format(your_url, remote_address, remote_port, remote_secure_state, remote_secure_protocol, remote_secure_cipher))

            else:

                your_url = result2['data']['requests'][0]['request']['documentURL']

                print("Results of urlscan.io:<br><br>Link: {}<br><br>Remote address: {}<br><br>Remote port: {}<br><br>Remote secure state: {}".format(your_url, remote_address, remote_port, remote_secure_state))

        elif arg == "3" :

            screenshot = result2['task']['screenshotURL']

            print('<h2>Capture of the page</h2><img src="{}" alt="alternatetext" width="1297" height="973" align="middle">'.format(screenshot))

    elif result['message'] == "Scan prevented ...":

        print("urlscan.io:<br><br>" + result['description'])

    elif result['message'] == 'DNS Error - Could not resolve domain':

        print("urlscan.io:<br><br>" + result['message'])

    else :

        print("urlscan.io:<br><br>" + "Something happened")

