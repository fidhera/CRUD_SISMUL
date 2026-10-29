<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="<?= site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?= site_url('asset/css/materialize.min.css'); ?>" media="screen,projection"/>
        <title>Sistem Multimedia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
                background-color: #f4f7f6;
                font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            }
            main { flex: 1 0 auto; padding-top: 40px; padding-bottom: 50px; }
            
            /* Glassmorphism Navbar */
            .navbar-glass { 
                background-color: rgba(255, 255, 255, 0.8) !important; 
                backdrop-filter: blur(12px); 
                -webkit-backdrop-filter: blur(12px);
                border-bottom: 1px solid rgba(255,255,255,0.3);
            }
            .navbar-glass .brand-logo { color: #1e293b; font-weight: 800; font-size: 1.8rem; letter-spacing: -0.5px; }
            .navbar-glass .nav-wrapper a { color: #64748b; font-weight: 600; transition: color 0.3s ease; }
            .navbar-glass .nav-wrapper a:hover { color: #4facfe; }
            
            /* Gradient Button with Glow */
            .btn-gradient { 
                background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); 
                border-radius: 30px; 
                text-transform: none; 
                font-weight: 700; 
                letter-spacing: 0.5px; 
                box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4); 
                transition: all 0.3s ease; 
            }
            .btn-gradient:hover { 
                transform: translateY(-2px); 
                box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6); 
            }
            
            /* Gradient Text */
            .text-gradient {
                background: linear-gradient(135deg, #1e293b 0%, #3b82f6 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            /* Modern Empty State with Floating Animation */
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-12px); }
                100% { transform: translateY(0px); }
            }
            .empty-state { 
                padding: 80px 20px; 
                text-align: center; 
                background: #ffffff; 
                border-radius: 24px; 
                box-shadow: 0 10px 30px rgba(0,0,0,0.03); 
                margin-top: 20px;
            }
            .floating-icon { 
                animation: float 4s ease-in-out infinite; 
                background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-size: 110px !important; 
                margin-bottom: 20px; 
            }
        </style>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav class="navbar-glass z-depth-0">
                <div class="nav-wrapper container">
                    <a href="<?= site_url(); ?>" class="brand-logo">
                        SISMUL<span style="color: #4facfe;">.</span>
                    </a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="<?= site_url('welcome/create'); ?>" class="btn btn-gradient z-depth-0 white-text"><i class="material-icons left">add</i>Karya Baru</a></li>
                        <li><a href="#"><i class="material-icons left">account_circle</i>Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="<?= site_url('welcome/create'); ?>"><i class="material-icons">add</i>Karya Baru</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="material-icons">account_circle</i>Login</a></li>
        </ul>

        <main class="container">