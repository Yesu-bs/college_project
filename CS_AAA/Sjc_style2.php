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
         padding: 12px;
         font-size: 18px;
         position: relative;
    }
    ul li a
    {
        text-decoration: none;
        color: white;
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
        z-index:1;
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
       width:98%;
       height:450px;
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
    .form1 form input[type='time']
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
    .form1 form input[type='file']
    {
        padding:10px;
        width:200px;
        border-radius:15px;
        margin-left:20px;
    }
    .form1 form input[type='file']::file-selector-button
    {
        padding:10px;
        background: #084cdf;
        color:white;
        border-radius:15px;
        border:white;
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
        height:100px;
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
    .read1
    {
        width:14.5%;
        background:white;
        opacity:0.9;
        margin-top:10px;
        margin-left:30px;
        display:flex;
        float:left;
    }
    .first
    {
        display:none;
    }
    .second
    {
        display:none;
    }
    .synopsis
    {
        display:none;
    }
    .third
    {
        display:none;
    }
    .conf
    {
        display:none;
    }
    .thesis
    {
        display:none;
    }
    select
    {
        padding:3px;
        border-radius:5px;
        font-size:20px;
        text-align:center;
    }
</style>
</head>";
// file-selector-button it is used to style the button of the file type.
?>