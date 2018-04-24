## PHP mini-REST client using CURL

These are testing files for a Webservice application for Metaquotes 4 using CURL. Metaquotes comes with a web services API is used to integrate the platform with websites. This is an indispensable tool for arranging user accounts and displaying quotes on a website. These are quick-testing files for this web service, written in plain PHP and [cURL](https://github.com/curl/curl), which is a computer software project providing a library and command-line tool for transferring data using various protocols. 

These files are mostly getters in order to display MT4 accounts information on your website, but also you can set a trading order and a user. The name of these files is also self-explanatory. 

* getGroups.php
* getSecurities.php
* getSymbols.php
* getUser.php
* postTrade.php    
* postUser.php
* putUser.php

## Configuration

You will need a LAMP Stack. If you do not already have it, you can use a [Vagrant Machine](https://box.scotch.io). [Vagrant](https://www.vagrantup.com) is an open-source software product for building and maintaining portable virtual software development environments. Scotch Box comes with cURL already installed for you. Once your server is running, you only need to clone this repo and configure the connection to your MT4 Webservice. 

You need to provide your Webservice IP address and the object this way:

HTTP://$IPSERVER/MP.MetaTrader.WebApi//api/OBJECT

The web service developed, supported OData protocol (http://www.odata.org/getting-started/basic-tutorial), which means that some data process -filtering, sorting, etc.- could be done on the fly. OData (Open Data Protocol) is an ISO/IEC approved, OASIS standard that defines a set of best practices for building and consuming RESTful APIs. OData helps you focus on your business logic while building RESTful APIs without having to worry about the various approaches to define request and response headers, status codes, HTTP methods, URL conventions, media types, payload formats, query options, etc. OData also provides guidance for tracking changes, defining functions/actions for reusable procedures, and sending asynchronous/batch requests.

**Notes**: This repository was developed in a timely manner and it is no longer maintained.  
