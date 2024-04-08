<template>
  <div class="navigation_container">
    <nav class="app_navigation">
      <div class="logo_container">
        <img src="/favicon.ico" alt="logo">
      </div>
      <router-link class="nav_item" to="/">Home</router-link>
      <router-link to="/catalogue" class="nav_item">Catalogue</router-link>
      <router-link to="/catalogue" class="nav_item">Contact</router-link>
      <router-link to="/catalogue" class="nav_item_special">Sign in/up</router-link>
    </nav>
  </div>
  <div class="content_container">
    <router-view></router-view>
  </div>
  
  </template>
  
  <script setup>
  </script>
  
  <style scoped>

  .navigation_container{
    height: 100px;
  }
    .navigation_container, .app_navigation{
      display: flex;
      flex-flow: row nowrap;
      justify-content: space-around;
      align-items: center;
    }
    .nav_item{
      margin: 80px;
      text-decoration: none;
      color: black;
      font-size: large;
      font-weight: bold;
      font-family: "Roboto Mono", monospace;
    }
   
    .nav_item_special{
      position: absolute;
      right: 1vw;
      padding: 20px;
      background-color: #fd8a5b;
      border-radius: 8px;
      text-decoration: none;
      color: black;
      font-family: "Roboto Mono", monospace;
    }
    .logo_container{
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      left: 1vw;
    }
    .content_container{
      display: flex;
      flex-flow: column nowrap;
      justify-content: center;
      align-items: center;
    }
 
  </style>