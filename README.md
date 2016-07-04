# website-generator

### DEMO
http://shvarcs.com/test/micro/index.html

###Aim
For simple "5-pagers" instead of WordPress use simple HTML site. Easy to add/remove pages, images, content. No DB needed. Once done - FTP to your server.

###Requirements
Super fast, gzip, minified, auto-builds

### Settings
Converted all web into relative paths, no needs for specific settings at moment

###Grunt
Open your Terminal (console) and CD to /app/
There are two commands:

 - `$ grunt dev`
 - `$ grunt dist`
 
 grunt will create app/dev/ folder and you can access with 
`http://generator.local/dev/` (replace with your path)

and grunt dist will create 
`http://generator.local/dist/` which is ready for distribution and you can FTP to your server

###Output
clear HTML/CSS/JS,  all minified, using pjax method to make seemless transition between pages

### Structure




