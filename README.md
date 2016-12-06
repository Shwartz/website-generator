# website-generator

### DEMO
http://demo.shvarcs.com/micro/index.html

### Aim
For simple "5-pagers" instead of WordPress use simple HTML site. Easy to add/remove pages, images, content. No DB needed. Once done - FTP to your server.

### Requirements
Super fast, gzip, minified, auto-builds

### Settings
Converted all web into relative paths, no needs for specific settings at moment

### Grunt
Open your Terminal (console) and CD to /app/
There are few you can use commands:

 - `$ grunt php:server`
    - Start php server and open browser `http://127.0.0.1:5000/`
    - Change url in browser: `http://127.0.0.1:5000/` - for development environment
 - `$ grunt dev`
    - Watcher for development environment, whatever you change in `/source/` is passed to `/dev/`
 - `$ grunt dist`
    - Deletes all the content in `/dist/` , minify all files, adds into this folder. Ready to upload to your server
 

### Output
clear HTML/CSS/JS,  all minified, using <a href="http://barbajs.org/">Barba.js</a> method to make seemless transition between pages

### Structure




