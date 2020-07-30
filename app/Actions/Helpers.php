<?php 

function setActive($routeName){
//-- request-> path, url, routeIs
 return request()->routeIs($routeName) ? 'active' : '';
}