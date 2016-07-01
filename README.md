# website-generator
###Aim
For simple "5-pagers" instead of WordPress use simple HTML site. Easy to add/remove pages, images, content. No DB needed. Once done - FTP to your server.

###Requirements
Super fast, gzip, minified, auto-builds

###Settings
**app/source/website/inc/_settings.php**
edit line `$webPath = "http://generator.local/@devPath@/";`

and replace with //generator.local with your local development url.
@devPath@ will be replaced with /dev/ or /dist/

**app/Gruntfile.js**

`var pathToLocalDevelopment = 'http://generator.local/';`
Change /generator.local/ to your path to app    

###Grunt
Open your Terminal (console) and CD to /app/
There are two commands:

 - $ grunt
 - $ grunt dist
 grunt will create app/dev/ folder and you can access with 
`http://generator.local/dev/` (replace with your path)

and grunt dist will create 
`http://generator.local/dist/` which is ready for distribution and you can FTP to your server

###Output
clear HTML/CSS/JS,  all minified, using pjax method to make seemless transition between pages

###Input
app/source/website - php file structure
app/assets - images etc
app/js
app/scss




