<?php
return[
    [
        "title"=> "Dashboard",
        "icon"=>"nav-icon fas fa-tachometer-alt",
        "route"=>"dashboard.index",
    ],
    [
        "title"=> "Categories",
        "icon"=>"nav-icon fas fa-list",
        "route"=>"categories.index",
        // "ability"=>"categories.view"
    ],
    [
        "title"=> "Tags",
        "icon"=>"nav-icon fas fa-list",
        "route"=>"tags.index",
    ],
    [
        "title"=> "Channels",
        "icon"=>"nav-icon fas fa-list",
        "route"=>"show.not-approved.channels",
    ],
    [
        "title"=> "Podcasts",
        "icon"=>"nav-icon fas fa-list",
        "route"=>"show.not-approved.podcasts",
    ],
   
];