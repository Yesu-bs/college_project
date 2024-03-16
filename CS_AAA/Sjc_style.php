<?php
echo "
<style>
   *
    {
        padding: 0;
        margin: 0;
        font-family: 'Times New Roman';
    }
    body{
        background-color: lightblue;
    }
    .header
    {
        background-color:teal;
        width: 100%;
        margin-left: auto;
        margin-bottom: auto;
        display: flex;
    }
    .header p
    {
        margin-top: 10px;
        font-size: 30px;
        text-align: center;
        font-weight: bold;
        font-style:italic;
        color: white;
        margin-left: 5px;
    }
    .header p span
    {
        font-size: 25px;
        text-align: center;
        font-weight: bold;
        color: white;
        margin-left: 5px;
    }
    .header img
    {
        border-radius: 50%;
        width:40px;
        height: 40px;
        margin-left: 32%;
        margin-top: 18px;
    }
    .header img
    {
        border-radius: 50%;
        width:50px;
        height: 50px;
        margin-left: 20%;
        margin-top: 2px;
    }
    ul
    {
        background-color:teal;
    }
    ul li
    {
         display: inline-block;
         padding: 15px;
         font-size: 19px;
         position: relative;
    }
    ul li a
    {
        text-decoration: none;
        color: white;
    }
    ul li button
    {
        background:teal;
        border-style:none;
        background:none;
    }
    ul li:hover
    {
        background-color: black;
    }
    ul li .sub-menu
    {
        display: none;
        position: absolute;
    }
   
    ul li:hover .sub-menu
    {
        display:block;
        width: 230px;
        left:0px;
        margin-top: 15px; 
        background-color: teal;
    }
    .submenu
    {
        display: none;
        position: absolute;
    }
    #menus1:hover .submenu
    {
        display:block;
        width: 230px;
        // right:242px;
        left:240px;
        top:105px;
        background-color: teal;
    }
    .menu
    {
        left:10px;
        width: 210px;
        padding: 15px;
        background: teal;   
    }
    #menus1:hover .submenu .menu:hover
    {
        background-color:black;
    }
    .menus
    {
        left:10px;
        width: 210px;
        padding: 15px;
        background: teal;
    }
    ul li:hover .sub-menu .menus:hover
    {
        background-color:black;
    }
    .form1
    { 
       width:78%;
       height:250px;
       background-color:#045c66;
        margin-left:auto;
        margin-right:auto;
        margin-top:10px;
        padding:5px;
        font-weight:bold;
        border-radius:10px;
        border: 3px solid black;
        color:white;
        overflow-y:scroll;
        box-shadow:0 8px 32px 0 #666;
    }
    .form1 p
    {
        text-align:center;
        font-size:30px;
        color:white;
        font-weight:bold;
    }
    .form1 form
    {
        margin-left:10px;
    }
    .form1 form input[type='text']
    {
        padding:10px;
        width:250px;
        border-radius:5px;
        margin-top:10px;
        margin-bottom: 12px;
    }
    .form1 form input[type='number']
    {
        padding:10px;
        width:250px;
        border-radius:5px;
        margin-top:10px;
        margin-bottom: 12px;
    }
    .form1 form input[type='date']
    {
        padding:10px;
        width:250px;
        border-radius:5px;
        margin-top:10px;
        margin-bottom: 12px;
    }
    .form1 form input[type='url']
    {
        padding:10px;
        width:250px;
        border-radius:5px;
        margin-top:10px;
        margin-bottom: 12px;
    }
    .form1 form input[type='radio']
    {
        width:15px;
        height:15px;          
    }
    .form1 form input[type='submit']
    {
        padding:10px;
        width:100px;
        border-radius:15px;
        margin-left:20px;
        cursor:pointer;
    }
    .form1 form input[type='submit']:hover
    {
        padding:10px;
        width:100px;
        border-radius:15px;
        margin-left:20px;
        color:white;
        background:black;
        cursor:pointer;
    }
    .form1 form input[type='reset']
    {
        padding:10px;
        width:100px;
        border-radius:15px;
        margin-left:20px;
    }
    .form1 form input[type='reset']:hover
    {
        padding:10px;
        width:100px;
        border-radius:15px;
        margin-left:20px;
        color:white;
        background:black;
        cursor:pointer;
    }
    .form1 form label
    {
        margin-top:30px;
    }
    .form1 form select
    {
        padding:5px;
        border-radius:5px;
        font-size:20px;
        text-align:center;
    }
    .form1 form table 
    {
        width:100%;
        margin-top:10px;
    }
    .read
    {
        width:100%;
        height:200px;
        background:white;
        opacity:0.9;
        margin-top:40px;
        overflow:scroll;
    }
    .read table
    {
        margin-top:auto;
        margin-bottom:auto;
        width:100%;
    }
    .read table tr th
    {
        text-align:center;
        background:yellowgreen;
    }
    .read table tr td
    {
        
        text-align:center;
        background:whitesmoke;
    }
    #delete
    {
        background:red;
        width:50px;
        color: white;
        height:30px;
        border-radius:5px;
        cursor: pointer;
    }
    #delete a
    {
        text-decoration:none;
        color:white;
    }
    #update
    {
        margin-top:10px;
        background:blue;
        width:50px;
        color: white;
        height:30px;
        border-radius:5px;
        cursor: pointer;
    }
    #update a
    {
        text-decoration:none;
        color:white;
    }
    .staff
    {
        margin-top:5px;
        text-align:center;
        color: black;
        font-weight:bold;
        font-size:30px;
    }
    #back
    {
        padding:10px;
        width:100px;
        border-radius:15px;
        margin-left:20px;
    }
    #back a{
        text-decoration:none;
        color:black;
    }
    .profile
    {
        margin-top:10px;
    }
    .profile table
    {
        background:white;
        margin-left:auto;
        margin-right:auto;
    }
    .profile table tr td, th
    {
        padding:6px;
    }
    .details
    {
        margin-top:10px;
    }
    .details table
    {
        margin-left:auto;
        margin-right:auto;
        border-collapse:collapse;
        padding:10px;
    }
    .details table tr th
    {
        padding:10px;
        width:300px;
        text-align:center;
        background:yellowgreen;
    }
    .details table tr td
    {
        padding:10px;
        width:100px;
        font-weight:bold;
        text-align:center;
        background:white;
    }
</style>
</head>";
?>