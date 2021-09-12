# SUSLINK

Project created to gain information of suspect pages, links and domains.

## Features

**Database**

- More than 1.2k suspicious links/domains, such as Fraudulent Websites, Scam Websites, Cryptocurrency Scam List, Cheat Games, Fraudulent Domain.

**API**

- **SUSLINK** uses the https://urlscan.io/ API to gather more information about the given link.

![alt text](https://i.gyazo.com/72e9c05e19f9de743fafb30cb8259b0e.png)

**Pre-Screenshot**

- **SUSLINK** gives you a screenshot of the given link using the urlscan.io API.

![alt text](https://i.gyazo.com/4543c12124190e23342e3962d514af80.png)

## Requirements

**Python 3.9 (64-bit)**

Python 3.9 also does need the following modules:

- requests
- json
- sys
- urllib
- time

**PHP 8.0.6**

**SUSLINK** also works in different versions of PHP.

## Installation

```
git clone https://github.com/kamiras/SUSLINK.git
```


```
pip install requests
pip install urllib3
```

## Usage

To work with **SUSLINK** you need to execute the proyecto.php file. You cand drag all the files of the project and leave it in your **localhost/** directory. Or you can drag the directory of **SUSLINK** and leave it in your **localhost/SUSLINK/**.

In case of copying all the files to your main directory you would have to search:
```
http://localhost/proyecto.php
```

In case of copying the directory of SUSLINK to your main directory you would have to search:
```
http://localhost/SUSLINK/proyecto.php
```
One additional think to say is that the project takes 40 seconds to analyze the link/domain. That is caused by the urlscan API, their API takes about a half minute to deploy the json code, once the json code is read **SUSLINK** process it with Python. 

## Disclaimer

This tool is only for testing and academic purposes. **Do not use it for illegal purposes**. It is the end user’s responsibility to obey all applicable local, state and federal laws. Developers assume no liability and are not responsible for any misuse or damage caused by this tool and software in general.
